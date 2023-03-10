=== User Role Editor Pro ===
Contributors: Vladimir Garagulya (shinephp)
Tags: user, role, editor, security, access, permission, capability
Requires at least: 4.0
Tested up to: 4.3.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

With User Role Editor WordPress plugin you may change WordPress user roles and capabilities easy.

== Description ==

With User Role Editor WordPress plugin you can change user role (except Administrator) capabilities easy, with a few clicks.
Just turn on check boxes of capabilities you wish to add to the selected role and click "Update" button to save your changes. That's done. 
Add new roles and customize its capabilities according to your needs, from scratch of as a copy of other existing role. 
Unnecessary self-made role can be deleted if there are no users whom such role is assigned.
Role assigned every new created user by default may be changed too.
Capabilities could be assigned on per user basis. Multiple roles could be assigned to user simultaneously.
You can add new capabilities and remove unnecessary capabilities which could be left from uninstalled plugins.
Multi-site support is provided.

== Installation ==

Installation procedure:

1. Deactivate plugin if you have the previous version installed. If you have free version you should deactivate it too.
2. Extract "user-role-editor-pro.zip" archive content to the "/wp-content/plugins/user-role-editor-pro" directory.
3. Activate "User Role Editor Pro" plugin via 'Plugins' menu in WordPress admin menu. 
4. Go to the "Settings"-"User Role Editor" and adjust plugin options according to your needs. For WordPress multisite URE options page is located under Network Admin Settings menu.
5. Go to the "Users"-"User Role Editor" menu item and change WordPress roles and capabilities according to your needs.


== Changelog ==

= [4.20] 14.10.2015 =
* Core version: 4.19.3
* Added option to force all custom posts types to use its own custom capabilities set instead of usage of one built on 'post', e.g. 'edit_videos' instead of 'edit_posts'.
* User Role Editor Options page help section was updated. 
* Fix: Admin menu access restrictions were not applied at 'new-user.php' page under multisite for the single site administrator role with 'allow_edit_users_to_not_super_admin' option turned on. Special flag was set to indicate that single site admin gets raised (superadmin) permissions temporary for the 'user-new.php' page, but current user is not the superadmin really. 
  (This temporary permissions raising is done to allow single site admin to add new users under multisite.)
* Fix: Custom posts types selection query was updated to include all custom post types except 'built-in' types when adding custom capabilities for them.
* Fix: Admin menu access: URLs beyound admin menu are not blocked for the "block not selected" model now. This allows to work with posts under this model of blocking for example. 

= [4.19.2] 01.10.2015 =
* Core version: 4.19.2
* Fix: Default role value has not been refreshed automatically after change at the "Default Role" dialog.
* Fix: global $post variable was changed in some cases by the posts view restrictions add-on.
* Fix: Admin menu access add-on: User could upload new media at the Post Editor with "Media -> Add New" menu item blocked. "File Upload" tab is removed in this case now. User may select from the existing Media Library items only.
* More detailed notice messages are shown after default role change - to reflect a possible error or problem.
* Other default roles (in addition to the primary role) has been assigned to a new registered user for requests from the admin back-end only. Now this feature works for the requests from the front-end user registration forms too (including multisite).
* Interface to Posts bulk action "Edit access" was available to the users without "ure_edit_posts_access" capability - fixed. Action itself was not fulfilled (blocked at server side) due to obvious permissions error.
* Content view restrictions add-on: custom post types selection enhanced in order to include types which are not public 
* Content view restrictions add-on: processes now custom post type content beyond the main loops, including 'wlbdash'(Dashboard) post type from "White Label Branding for WordPress Multisite" plugin.
* Content edit restrictions add-on: supports unique create custom post type capability even in case it does not use 'edit_' in its name. For example for 'wlbdash' post type, create post capability will get name 'create_wlbdashs' instead of default 'wlb_dashboard_tool'.
* Admin menu access add-on: bug was fixed for URL starting from 'admin.php?page='
* Added new filter 'ure_get_allowed_gf_forms'. It allows to modify array of Gravity Forms ID available to the current user.
* CSS enhanced to exclude column wrapping for the capabilities with the long names.
* The translation text domain was changed to the plugin slug (user-role-editor) for the compatibility with translations.wordpress.org



= [4.19] 04.08.2015 =
* It is possible to assign to the user multiple roles directly through a user profile edit page. 
* Custom SQL-query (checked if the role is in use and slow on the huge data) was excluded and replaced with WordPress built-in function call. [Thanks to Aaron](https://wordpress.org/support/topic/poorly-scaling-queries).
* Bulk role assignment to the users without role was rewritten for cases with a huge quant of users. It processes just 50 users without role for the one request to return the answer from the server in the short time.
* Admin menu access add-on: 
*   1) 'block not selected' access model was added to the default 'block selected' one. It is more convenient in cases when you wish to block automatically all new added menu items. 
*   2) use top checkbox control to select/unselect all checkboxes. Click on it with 'Shift' key inverts current selection.
* Other roles access add-on: 
*   1) 'block not selected' access model was added to the default 'block selected' one. It is more convenient in cases when you wish to block automatically all new added roles.
*    2) use top checkbox control to select/unselect all checkboxes. Click on it with 'Shift' key inverts current selection.
* It is possible to set restrictions to the main site widgets at the Network Admin and replicate them to the whole network. 
* Content view restrictions add-on: 
*   1) It is possible to set what categories (tags/custom taxonomies) are allowed/prohitited to view for the selected role.
*   2) It is possible to select between HTTP 404 error or custom error message for the case of access error.
*   3) Fixed to work for the custom post types with own user capabilities set.
*   4) "No role for this site" item is available in the roles list at a post level interface.
*   5) Restriction is not applied to the post by default if logged in user can edit it. It is possible to change this rule
*   using filter 'ure_restrict_content_view_for_authors_and_editors'. It takes and returns 1 boolean parameter: false - do not restrict, true - restrict.
*   6) Enhanced compatibility with the Events Manager plugin ( https://wordpress.org/plugins/events-manager ).
*   7) Fixed bug which did not allow to open roles list for a new (not saved) post.
*   8) It is possible to retrieve post view access restrictions data for the post ID from other plugins, 
    for example do not sent new post notification to the users, who don't have access to view it. 
*   Function ure_get_post_view_access_users() returns the object with properties: 
*     1) restriction: string: prohibited/allowed; 
*     2) roles - array of roles, for which this restriction is applied; 
*     3) users: array of user ID, which have those roles.   
* Edit posts/pages restrictions add-on: 
*   1) Bug fix: when user with posts/pages edit restrictions may access restricted posts/pages directly by post ID and got 'Edit' URL for the restricted post at the front-end.  
*   2) If you set 'edit posts/pages with author user ID' restriction, it is applied to ALL post types. That is if author does not have any posts at some post type, user will see the empty list of posts at that type. 
If you set 'edit posts/pages/custom post types with ID' only then restrictions are applied only to the post types to which posts belongs.
*   3) It is possible now to set edit restrictions for the user by category/taxonomy ID.
*   4) Pages filtering enhanced for compatibility with other plugins, respecting "get_pages" filter (like "CMS Tree Page View" one).
*   5) User with post/pages edit restrictions applied can see own unattached media library items in additions to the allowed posts attachments.
*   6) If posts/pages restrictions were not set for the user, full list of media library items is available.
*   7) Filter ure_attachments_show_full_list allows to show full Media Library items list to the user with editing restrictions set.
*   8) Filter ure_posts_show_full_list allows to show full posts/pages/custom posts types list to the user with editing restrictions set.

= 4.18.5 =
* 14.06.2015
* It is possible to input license code to the wp-config.php now. Add this line: define(URE_LICENSE_KEY, 'your-license-code-here');
Users uncomfortable with wp-config.php editing may still input license code at "Settings->User Role Editor->General" tab.
* License code saved at the "Settings->User Role Editor->General" tab is not removed anymore after change of site absolute path, host or database name.
* Bug was fixed: "Network Update" did not work at FireFox due to JavaScript bug.
* PHP notice was removed. It was shown at the Plugins page, when an update to the URE Pro was available.

= 4.18.4 =
* 28.05.2015
* Edit posts/pages restrictions add-on: Now user can not edit prohibited post/page manually inserting its ID to the edit URL.
* Admin menu access add-on: 'Customize' menu item is available now for non-English WordPress default languages too.

= 4.18.3 =
* 06.05.2015
* Bug fix for "Admin menu access" add-on: direct access to the wp-admin/customize.php link (Appearance->Customize menu item) was not blocked properly. 
* As additional security measure "Welcome" panel is removed for the role with access restriction to the "Customize" admin menu item.

= 4.18.2 =
* 30.04.2015
* Calls to the functions add_query_arg(), remove_query_arg() are escaped with esc_url_raw() to exclude potential XSS vulnerabilities.

= 4.18.1 =
* 24.02.2015
* Fixed PHP fatal error for "Reset" roles operation.
* Fixed current user capability checking before URE Options page open.
* 3 missed phrases were added to the translations files.

= 4.18 =
* 11.02.2015
* Own custom user capabilities, e.g. 'ure_edit_roles' are used to restrict access to User Role Editor functionality.
* Posts/pages edit access restriction add-on functionality was extended to the Media Library. Posts/pages attachments becomes unavailable automatically if correspondent post/page edit is prohibited.
* Posts/pages edit access restriction add-on works with custom post types now.
* Posts/pages view access restriction works with custom post types now.
* Admin menu items with empty user capability are available in "Admin menu access" add-on now. "Participants Database" plugin defines its menu this way.
* Some plugins use meta capabilities instead of real user capabilities, like 'jetpack_admin_page' in "JetPack" or 'wpcf7_read_contact_forms' in "Contact Form 7". "Admin menu access" add-on recognizes such meta capabilities now. These meta-caps are replaced at "Admin menu" window with correspondent (mapped) real user capabilities for your further reference.
* Admin menu access add-on updated: 'Howdy, ...' menu including 'Logout' menu item at top bar admin menu will not disappear after blocking 'Profile' menu. 
* Top bar menu 'SEO' from "WP SEO from Yoast" plugin is blocked if user has no 'manage_options' capability or correspondent admin menu is blocked.
* Admin menu blocking is available for 'administrator' role under multisite. You should be superadmin. Do not give administrator access to URE in this case.
* More universal checking applied to the custom post type capabilities creation to exclude not existing property notices.
* New option "Edit user capabilities" was added. If it is unchecked - capabilities section of selected user will be shown in the readonly mode. Administrator (except superadmin for multisite) can not assign capabilities to the user directly. He should make it using roles only.
* Fixed JavaScript bug with 'Reset Roles' for FireFox v.34.

= 4.17 =
* 03.10.2014
* "Other roles access" additional module was added. It allows to define which other roles user with current role may see at WordPress: dropdown menus, e.g assign role to user editing user profile, etc.
* Correspondent front-end admin menu bar items are blocked according to settings of "Admin menu blocking" add-on.
* Edit access restrictions add-on: Bulk actions helper was added. It is possible to select posts from the posts list and allow/prohibit access for editing them to the group of users. Go to the "Posts/Pages", select bulk action "Edit Access" and click "Apply".
* uninstall.php was updated to delete data of "Widgets access", "Other roles access" add-ons.
* Multisite: - case when URE was not network activated: It is possible to use own settings for single site activated instances of User Role Editor. It used the only version of settings values from the main blog earlier. 
  Important - in order to have ability to setup updates automatically URE should be activated for the main blog of the network.
  Some critical options were hidden from the "Multisite" tab for single site administrators. Single site admin should not have access to the options which purpose is to restrict him.
  Attention! In case you decide to allow single site administrator activate/deactivate User Role Editor himself, setup this PHP constant at the wp-config.php file:
  define('URE_ENABLE_SIMPLE_ADMIN_FOR_MULTISITE', 1);
  Otherwise single site admin will not see User Role Editor in the plugins list after its activation. User Role Editor hides itself under multisite from all users except superadmin by default.

= 4.16 =
* 12.09.2014
* "Rename role" button was added to the URE toolbar. It allows to change user role display name (role ID is always the same). Be careful and double think before rename some built-in WordPress role.
* "create_sites" user capability was added to the list of built-in WordPress user capabilities for WordPress multisite. It does not exist by default. But it is used to control "Add New" button at the "Sites" page under WordPress multisite network admin.
* bug fix: WordPress database prefix value was not used in 2 SQL queries related to the "count users without role" module - updated.
* Admin menu access module: front-end admin menu bar was hidden for user for which you blocked at least one admin menu items.
* Admin menu access module: fixes for the processing of "Appearance" menu and its items "Themes", "Customize" (required user capability, etc.).
* Roles export: file name with exported roles data is built now using this scheme: ure-roles-backup_Y-m-d_h_i_s.dat, e.g. ure-roles-backup_2014-09-05_15_23_09.dat

= 4.15 =
* 30.08.2014
* Widgets permissions module was added. If role has access to the "Widgets" menu item of "Appearance" menu, you may block access to the selected widgets for that role. Use a new "Widgets" button at the role editor page.

= 4.14.4 =
* 04.08.2014
* Fix for: PHP Notice:  Undefined variable: user_role_editor in user-role-editor-pro.php on line 69 introduced in version 4.14.2. If automatic updates feature was broken for you for that reason, update to this version manually.
* Integration with Gravity Forms permissions system was updated for admin menu blocking module.

= 4.14.3 =
* 25.07.2014
* Integer "1" as default capability value for new added empty role was excluded for the better compatibility with WordPress core. Boolean "true" is used instead as WordPress itself does.
* Integration with Gravity Forms permissions system was enhanced for WordPress multisite.
* Roles import module may import role with integer (not boolean) capability value "1". Error was shown earlier. 
* Error message from import roles module shows role and capability which does not pass the validation rule.

= 4.14.2 =
* 24.07.2014
* Admin menu access module: 
  - Bug was fixed which prevented to prohibit direct URL access to the blocked menu items. Recheck roles blocked admin menu items after installing this update as with low probability you may need to redefine them from the scratch. Try to deactivate/activate plugin 1st (Network deactivate/Network Activate for WP multisite). Generally it helps according to the test results;
  - role menu permissions processing was updated for the Gravity Forms plugin under WP multisite.
* Integration with Gravity Forms permissions system was enhanced for WP multisite.
* MySQL query optimized in order to reduce memory consumption.
* Extra WordPress nonce field was removed from the post at main role editor page.
* The instance of main plugin class User_Role_Editor is available for other developers via $GLOBALS['user_role_editor']
* Compatibility issue with the theme ["WD TechGoStore"](http://wpdance.com) is resolved. This theme loads its JS and CSS stuff for admin backend unconditionally - for all pages except loading for its own pages only. 
While the problem is caused just by CSS, URE unloads for optimization purpose all this theme's JS and CSS from WP admin backend pages where conflict is possible.
* Fix for the issue with periodic URE license key value disappearance at WordPress multi-site.
* Minor code enhancements.


= 4.12.1 =
* 01.07.2014
* Technical update to fix the issue with the automatic updates API link. This link should start from https://www.role-editor.com instead of https://role-editor.com
This is related to migration or role-editor.com to the Google App Engine platform, which does not support SSL for the naked custom domains and 
force us SSL secured links from www subdomain, e.g. https://www.role-editor.com in our case.


= 4.12 =
* 22.04.2014
* Use new "Admin Menu" button to block selected admin menu items for role. You need to activate this module at the "Additional Modules". 
This feature is useful when a lot of submenu items are restricted by the same user capability, e.g. "Settings" submenu, but you wish allow to user work just with part of it. 
You may use "Admin Menu" dialog as the reference for your work with roles and capabilities as "Admin Menu" shows 
what user capability restrict access to what admin menu item.
* Posts/Pages edit restriction feature does not prohibit to add new post/page now. Now it should be managed via 'create_posts' or 'create_pages' user capabilities.
* If you use Posts/Pages edit restriction by author IDs, there is no need to add user ID to allow him edit his own posts or page. Current user is added to the allowed authors list automatically.
* New tab "Additional Modules" was added to the User Role Editor options page. As per name all options related to additional modules were moved there.
* Bug was fixed. It had prevented bulk move users without role (--No role for this site--) to the selected role in case such users were shown more than at one WordPress Users page.


= 4.11 =
* 06.04.2014
* Single-site: It is possible to bulk move users without role (--No role for this site--) to the selected role or automatically created role "No rights" without any capabilities. 
Get more details at https://www.role-editor.com/no-role-for-this-site/
* Posts/pages edit restriction controls are shown at user profile in case only if user can edit posts/pages.
* It is possible to restrict editing posts/pages by its authors user ID (targeted user should have edit_others_posts or edit_others_pages capability).
* Multi-site: Superadmin can setup individual lists of themes available for activation to selected sites administrators.
* Gravity Forms access restriction module was tested and compatible with Gravity Forms version 1.8.5
* Plugin uses for dialogs jQuery UI CSS included into WordPress package instead of external one.


= 4.10 =
* 15.02.2014
* Security enhancement: '__()' and '_e()' WordPress text translation functions were replaced with more secure 'esc_html__()' and 'esc_html_e()'.
* It is possible to restrict access to the post or page content view for selected roles. Activate the option at plugin "Settings" page and use new "Content View Restrictions" metabox 
at post/page editor to setup content view access restrictions.
* Gravity Forms access management module was updated for compatibility with Gravity Forms version 1.8.3. If you need compatibility with earlier Gravity Forms versions, e.g. 1.7.9, use User Role Editor version 4.9.

= 4.9 =
* 19.01.2014
* New tab "Default Roles" was added to the User Role Editor settings page. It is possible to select multiple default roles to assign them automatically to the new registered user.
* CSS and dialog windows layout various enhancements.
* 'members_get_capabilities' filter was applied to provide better compatibility with themes and plugins which may use it to add its own user capabilities.
* jQuery UI CSS was updated to version 1.10.4.
* Option was added to download jQuery UI CSS from the jQuery CDN.
* Bug was fixed: Plugins activation assess restriction section was not shown for selected user under multi-site environment.


= 4.8 =
* 10.12.2013
* Role ID validation rule was added to prohibit numeric role ID - WordPress does not support them.
* HTML markup was updated to provide compatibility with upcoming WordPress 3.8 new administrator backend theme MP6
* It is possible to restrict access of single sites administrators to the selected user capabilities and Add/Delete role operations inside User Role Editor.
* Shortcode [user_role_editor roles="none"]text for not logged in users[/user_role_editor] is available
* Gravity Forms available at "Export Entries", "Export Forms" pages is under URE access restriction now, if such one was set for the user.
* Gravity Forms import could be set under "gravityforms_import" user capability control
* Option was added to show/hide help links (question signs) near the capabilities from single site administrators.
* Plugin "Options" page was divided into sections (tabs): General, Multisite, About.
* Author's information box was removed from URE plugin page.
* Restore previous blog 'switch_to_blog($old_blog_id)' call was replaced to 'restore_current_blog()' where it is possible to provide better compatibility with WordPress API. 
After use 'switch_to_blog()' in cycle, URE clears '_wp_switched_stack' global variable directly instead of call 'restore_current_blog()' inside the cycle to work faster.

= 4.7. =
* 04.11.2013
* "Delete Role" menu has "Delete All Unused Roles" menu item now.
* More detailed warning was added before fulfill "Reset" roles command in order to reduce accident use of this critical operation.
* Bug was fixed at Ure_Lib::reset_user_roles() method. Method did not work correctly for the rest sites of the network except the main blog.
* Post/Pages editing restriction could be setup for the user by one of two modes: 'Allow' or 'Prohibit'.
* Shortcode [user_role_editor roles="role1, role2, ..."]bla-bla[/user_role_editor] for posts and pages was added. 
You may restrict access to content inside this shortcode tags this way to the users only who have one of the roles noted at the "roles" attribute.
* If license key was installed it is shown as asterisks at the input field.
* In case site domain change you should input license key at the Settings page again.

= 4.6.0.2 =
* 27.10.2013
* Bug fix: Invalid notice "Unknown error: Roles import was failed" was shown after successful roles import to the single WordPress site.
* Update: Spaces in user capability are allowed for import to provide compatibility with other plugins, which use spaces in user capabilities, e.g. NextGen Gallery's "NextGEN Change options", etc.

= 4.6.0.1 =
* 26.10.2013
* Bug fix: PHP error prevented to view Gravity Forms entries and WooCommerce coupons after turning on the "Activate user access management to editing selected posts and pages" option.

= 4.6 =
* 23.10.2013
* Content editing restriction: It is possible to differentiate permissions for posts/pages creation and editing. Use the "Activate "Create Post/Page" capability" option for that.
* Content editing restriction: Restrict user to edit just selected posts and pages. Use the "Activate user access management to editing selected posts and pages" option for that.
* Multi-site: Assign roles and capabilities to the users from one point at the Network Admin. Add user with his permissions together to all sites of your network with one click.
* Multi-site: unfiltered_html capability marked as deprecated one. Read this post for more information (http://shinephp.com/is-unfiltered_html-capability-deprecated/).
* Multi-site: 'manage_network%' capabilities were included into WordPress core capabilities list.
* On screen help was added to the "User Role Editor Options" page - click "Help" at the top right corner to read it.
* 'wp-content/uploads' folder is used now instead of plugin's own one to process file with importing roles data.
* Bug fix: Nonexistent method was called to notify user about folder write permission error during roles import.
* Bug fix: turning off capability at the Administrator role fully removed that capability from capabilities list.
* Various internal code enhancements.
* Information about GPLv2 license was added to show apparently ??? ???User Role Editor Pro??? are licensed under GPLv2 or later.

Click [here](http://role-editor.com/changelog)</a> to look at [the full list of changes](http://role-editor.com/changelog) of User Role Editor plugin.
