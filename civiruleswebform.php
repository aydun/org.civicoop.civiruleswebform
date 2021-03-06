<?php

require_once 'civiruleswebform.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function civiruleswebform_civicrm_config(&$config) {
  _civiruleswebform_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param array $files
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function civiruleswebform_civicrm_xmlMenu(&$files) {
  _civiruleswebform_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function civiruleswebform_civicrm_install() {
  require_once('CRM/Civiruleswebform/Utils.php');
  // ensure CiviRules in installed otherwise error
  if (CRM_Civiruleswebform_Utils::isCiviRulesEnabled() == FALSE) {
    throw new Exception('This extension requires CiviRules to be installed and enabled, install the CiviRules extension 
    and then try again');
  }
  CRM_Civiruleswebform_Utils::addTriggersWebformSubmit();
  _civiruleswebform_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function civiruleswebform_civicrm_uninstall() {
  require_once('CRM/Civiruleswebform/Utils.php');
  // delete trigger when extension is uninstalled
  CRM_Civiruleswebform_Utils::deleteTriggerWebformSubmit();
  _civiruleswebform_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function civiruleswebform_civicrm_enable() {
  require_once ('CRM/Civiruleswebform/Utils.php');

  // ensure CiviRules in installed otherwise error
  if (CRM_Civiruleswebform_Utils::isCiviRulesEnabled() == FALSE) {
    throw new Exception('This extension requires CiviRules to be installed and enabled, install the CiviRules extension 
    and then try again');
  }
  CRM_Civiruleswebform_Utils::addTriggersWebformSubmit();
  _civiruleswebform_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function civiruleswebform_civicrm_disable() {
  _civiruleswebform_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function civiruleswebform_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _civiruleswebform_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function civiruleswebform_civicrm_managed(&$entities) {
  _civiruleswebform_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * @param array $caseTypes
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function civiruleswebform_civicrm_caseTypes(&$caseTypes) {
  _civiruleswebform_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function civiruleswebform_civicrm_angularModules(&$angularModules) {
_civiruleswebform_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function civiruleswebform_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _civiruleswebform_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function civiruleswebform_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function civiruleswebform_civicrm_navigationMenu(&$menu) {
  _civiruleswebform_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'org.civicoop.civiruleswebform')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _civiruleswebform_civix_navigationMenu($menu);
} // */
