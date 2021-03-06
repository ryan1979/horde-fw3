<?php
/**
 * @package Hermes
 *
 * $Horde: hermes/lib/Forms/Export.php,v 1.6.2.1 2009-01-06 15:23:59 jan Exp $
 *
 * Copyright 2002-2009 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file LICENSE for license information (BSD). If you
 * did not receive this file, see http://www.horde.org/licenses/bsdl.php.
 *
 */

/**
 * Horde_Form
 */
require_once 'Horde/Form.php';

/**
 * ExportForm:: is the export form which appears with search results on
 * the search screen.
 *
 * @author Chuck Hagenbuch <chuck@horde.org>
 * @author  Jason M. Felice <jason.m.felice@gmail.com>
 * @package Hermes
 */
class ExportForm extends Horde_Form {

    var $_useFormToken = false;

    function ExportForm(&$vars)
    {
        global $perms;

        parent::Horde_Form($vars, _("Export Search Results"));

        $formats = array('hermes_csv' => _("Comma-Separated Variable (.csv)"),
                         'hermes_xls' => _("Microsoft Excel (.xls)"),
                         'iif' => _("QuickBooks (.iif)"),
                         'hermes_tsv' => _("Tab-Separated Variable (.tsv, .txt)"),
                         );

        $this->addVariable(_("Select the export format"), 'format', 'enum',
                           true, false, null, array($formats));

        if ($perms->hasPermission('hermes:review', Auth::getAuth(),
                                  PERMS_EDIT)) {
            $yesno = array('yes' => _("Yes"),
                           'no' => _("No"));
            $var = &$this->addVariable(_("Mark the time as exported?"),
                                       'mark_exported', 'enum', true, false,
                                       null, array($yesno));
            $var->setDefault('no');
        }

        $this->setButtons(_("Export"));
    }

}
