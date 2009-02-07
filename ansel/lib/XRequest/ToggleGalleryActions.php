<?php
/**
 * Ansel_XRequest_ToggleGalleryActions:: class for performing Ajax setting of
 * the gallery show_galleryactions user pref.
 *
 * $Horde: ansel/lib/XRequest/ToggleGalleryActions.php,v 1.7.2.2 2009/01/06 15:22:32 jan Exp $
 *
 * Copyright 2008-2009 The Horde Project (http://www.horde.org/)
 *
 * @author Michael J. Rubinsky <mrubinsk@horde.org>
 * @package Ansel
 */
class Ansel_XRequest_ToggleGalleryActions extends Ansel_XRequest {

    function Ansel_XRequest_ToggleGalleryActions($params)
    {
        // Setup the variables the script will need, if we have any.
        if (count($params)) {
            $this->_jsVars['actions'] = array(
                'bindTo' => $params['bindTo']
            );
        }

        parent::Ansel_XRequest($params);
    }

    function _attach()
    {
        // Include the js
        Horde::addScriptFile('togglewidget.js');

        $js = array();
        $js[] = "document.observe('dom:loaded', function() {Event.observe(actions.bindTo + '-toggle', 'click', function(event) {doActionToggle('" . $this->_params['bindTo'] . "', 'ToggleGalleryActions'); Event.stop(event)});});";
        $js[] = "if (typeof anselToggleUrl == 'undefined') { anselToggleUrl = '" . Horde::url('xrequest.php', true) . "';}";
        $this->_outputJS($js);
    }

    function handle($args)
    {
        $pref_value = $args['pref_value'];
        $GLOBALS['prefs']->setValue('show_actions', $pref_value);
        header('Content-Type: text/plain');
        echo 1;
    }

}
