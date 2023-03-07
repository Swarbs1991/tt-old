<?php
/**
 *
 * @author   Timo Reith <timo@ifeelweb.de>
 * @version  $Id: Rules.php 478 2017-05-22 20:24:38Z timoreithde $
 */ 
class Psn_Module_Premium_Features_Rules extends IfwPsn_Wp_Plugin_Feature_Abstract
{
    function init()
    {
        if ($this->_pm->getAccess()->isPlugin()) {

            // add toolbar features:
            IfwPsn_Wp_Proxy_Filter::add('psn_rules_toolbar', array($this, 'addAdminLinks'));
            IfwPsn_Wp_Proxy_Filter::add('psn_rules_toolbar_after', array($this, 'afterAdminLinks'));

            // handle premium controller actions:
            IfwPsn_Wp_Proxy_Action::add('psn_rules_action-export', array($this, 'export'));
            IfwPsn_Wp_Proxy_Action::add('psn_rules_action-bulk_export', array($this, 'bulkExport'));
            IfwPsn_Wp_Proxy_Action::add('psn_rules_action-import', array($this, 'import'));
            IfwPsn_Wp_Proxy_Action::add('psn_rules_action-copy', array($this, 'copy'));

            // list table options
            IfwPsn_Wp_Proxy_Filter::addPlugin($this->_pm, 'rules_bulk_actions', array($this, 'addBulkActions'));
            IfwPsn_Wp_Proxy_Filter::addPlugin($this->_pm, 'rules_col_name_actions', array($this, 'addColNameActions'));

            // extend rule
            IfwPsn_Wp_Proxy_Action::addPlugin($this->_pm, 'rule_form', array($this, 'extendRuleForm'));
        }

        IfwPsn_Wp_Proxy_Filter::addPlugin($this->_pm, 'max_rules', array($this, 'unsetMax'));

        add_filter('psn_rule_matches_dynamic_condition', array($this, 'ruleMatchesDynamicCondition'), 10, 3);
    }

    function load()
    {
        // TODO: Implement load() method.
    }


    public function addAdminLinks()
    {
        echo IfwPsn_Zend_Controller_ModelBinding::getImportItemsButton(__('Import rules', 'psn'));
    }

    public function unsetMax($max)
    {
        return 0;
    }

    public function afterAdminLinks()
    {
        echo PsnApplicationController::getImportForm(
            Psn_Model_Mapper_Rule::getInstance()->getSingular(), // uid
            __('Import rules', 'psn'), // title
            'rules.html#importing-rules', // help url
            admin_url('options-general.php?page=post-status-notifier&controller=rules&appaction=import') // form action
        );
    }

    /**
     * @param PsnRulesController $contoller
     */
    public function import(PsnRulesController $contoller)
    {
        $contoller->handleImport(array(
            'item_callback' => array($contoller, 'importItemCallback')
        ));
    }

    /**
     * @param PsnRulesController $contoller
     */
    public function export(PsnRulesController $contoller)
    {
        $contoller->handleExport( (int)$contoller->getRequest()->get('id'));

        $contoller->gotoIndex();
    }

    /**
     * @param PsnRulesController $contoller
     */
    public function bulkExport(PsnRulesController $contoller)
    {
        $contoller->handleExport( $contoller->getRequest()->getPost($contoller->getSingular()));

        $contoller->gotoIndex();
    }

    /**
     * @param PsnRulesController $contoller
     */
    public function copy(PsnRulesController $contoller)
    {
        $contoller->handleCopy(array(
            'values_callback' => array($this, 'copyCallback')
        ));
    }

    /**
     * @param $values
     * @return mixed
     */
    public function copyCallback($values)
    {
        if ($this->_pm->getOptionsManager()->getOption('psn_deactivate_copied_rules') !== null) {
            $values['active'] = 0;
        }
        return $values;
    }

    /**
     * @param $actions
     * @return mixed
     */
    public function addBulkActions($actions)
    {
        $actions['bulk_export'] = __('Export', 'psn');
        return $actions;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function addColNameActions($data)
    {
        $actions = $data['actions'];
        $item = $data['item'];

        $newActions = array();
        $newActions['edit'] = $actions['edit'];
        $newActions['copy'] = sprintf('<a href="?page=%s&controller=rules&appaction=copy&nonce=%s&id=%s" class="copyConfirm">'. __('Copy', 'psn') .'</a>',
            $_REQUEST['page'],
            wp_create_nonce(IfwPsn_Zend_Controller_ModelBinding::getCopyNonceAction(Psn_Model_Mapper_Rule::getInstance()->getSingular(), $item['id'])),
            $item['id']);
        $newActions['export'] = sprintf('<a href="?page=%s&controller=rules&appaction=export&id=%s">'. __('Export', 'psn') .'</a>', $_REQUEST['page'], $item['id']);
        $newActions['delete'] = $actions['delete'];

        return array('actions' => $newActions);
    }

    /**
     * @param $form
     */
    public function extendRuleForm(IfwPsn_Zend_Form $form)
    {
        $postWhitelist = $form->createElement('textarea', 'post_whitelist');
        $postWhitelist
            ->setLabel(__('Post whitelist', 'psn'))
            ->setDescription(__('A list of comma separated post IDs (e.g. 1,2,3). If entered, this rule will ONLY trigger on those posts. Leave blank to let this rule work with all posts.', 'psn'))
            ->setDecorators($form->getFieldDecorators())
            ->setFilters(array('StringTrim', 'StringToLower'))
            ->setAllowEmpty(true)
            ->setAttrib('rows', 1)
            ->setOrder(110);
        $form->addElement($postWhitelist);

        $postBlacklist = $form->createElement('textarea', 'post_blacklist');
        $postBlacklist
            ->setLabel(__('Post blacklist', 'psn'))
            ->setDescription(__('A list of comma separated post IDs (e.g. 4,5,6). If entered, this rule will NOT trigger on those posts. Leave blank to let this rule work with all posts.', 'psn'))
            ->setDecorators($form->getFieldDecorators())
            ->setFilters(array('StringTrim', 'StringToLower'))
            ->setAllowEmpty(true)
            ->setAttrib('rows', 1)
            ->setOrder(111);
        $form->addElement($postBlacklist);

        if ($this->_pm->hasOption('psn_conditions_enable_dyn_match')) {

            IfwPsn_Wp_Proxy_Script::loadAdmin('ace', $this->_pm->getEnv()->getUrlAdminJs() . 'lib/ace/ace.js', array(), $this->_pm->getEnv()->getVersion());
            IfwPsn_Wp_Proxy_Script::loadAdmin('prm-rules-form', $this->getModule()->getEnv()->getUrlJs() . 'rules_form.js', array('jquery'), $this->_pm->getEnv()->getVersion());
            IfwPsn_Wp_Proxy_Style::loadAdmin('prm-rules-form-css', $this->getModule()->getEnv()->getUrlCss() . 'admin.css', array(), $this->_pm->getEnv()->getVersion());

            $from = $form->createElement('textarea', 'dyn_match');
            $from
                ->setLabel(__('Dynamic match condition', 'psn_prm'))
                ->setDescription(__('Enter dynamic match condition code here.', 'psn_prm') . ' ' . sprintf(__('For more details please check the <a href="%s" target="_blank">documentation</a>.', 'psn'), $this->_pm->getConfig()->plugin->docUrl . 'dynamic_match_condition.html') . '<br>' .
                    __('If the result equals to "yes", the rule will match. Leave blank to ignore this matching condition.', 'psn_prm'))
                ->setDecorators($form->getFieldDecorators())
                ->setFilters(array('StringTrim'))
                ->setAttrib('cols', 80)
                ->setAttrib('rows', 5)
                ->setAttrib('ace_editor', true)
                ->setAttrib('html_entity_decode', false)
                ->setOrder(42);
            $form->addElement($from);
            $form->getElement('dyn_match')->getDecorator('Description')->setEscape(false);
        }
    }

    /**
     * @param $result
     * @param Psn_Model_Rule $rule
     * @param WP_Post $post
     * @return mixed
     */
    public function ruleMatchesDynamicCondition($result, Psn_Model_Rule $rule, WP_Post $post)
    {
        if ($this->_pm->hasOption('psn_conditions_enable_dyn_match') && $rule->hasDynamicMatching()) {

            $isDebug = $this->_pm->hasOption('psn_dyn_match_conditions_debug');
            if ($isDebug) {
                $log = sprintf('Rule: %s (ID: %d)' . PHP_EOL, $rule->getName(), $rule->get('id'));
                $log .= sprintf('Post: %s (ID: %d)' . PHP_EOL . PHP_EOL, $post->post_title, $post->ID);
                $log .= sprintf('Condition syntax: %s' . PHP_EOL . PHP_EOL, PHP_EOL . $rule->getDynamicMatching());
            }

            $replacer = new Psn_Notification_Placeholders($post);

            $conditionsParser = IfwPsn_Wp_WunderScript_Parser::getInstance();
            $conditionsParser->setLogger($this->_pm->getLogger());
            $context = $replacer->getTwigContext($rule->getDynamicMatching());

            $replaceResult = $replacer->replace($rule->getDynamicMatching());
            if ($isDebug) {
                $log .= sprintf('Condition syntax after placeholder replacing: %s' . PHP_EOL . PHP_EOL, PHP_EOL . $replaceResult);
            }
            $replaceResult = $conditionsParser->parse($replaceResult, $context, Psn_Module_Premium_Conditions_Handler::getInstance($this->_pm)->getConditionsDebugger());

            if ($isDebug) {
                $log .= sprintf('Condition syntax result: %s' . PHP_EOL . PHP_EOL, $replaceResult);
            }

            if ($replaceResult != 'yes') {
                $result = false;
            }
            if ($isDebug) {
                $log .= sprintf('Condition result (boolean): %s' . PHP_EOL, var_export($result, true));
                $this->_pm->getLogger(Psn_Logger_Bootstrap::LOG_NAME)->debug('Dynamic rule matching', array(
                    'type' => Psn_Logger_Bootstrap::LOG_TYPE_INFO,
                    'extra' => $log
                ));
            }

        }

        return $result;
    }


}
