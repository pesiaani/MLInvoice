<?php
/*******************************************************************************
MLInvoice: web-based invoicing application.
Copyright (C) 2010-2012 Ere Maijala

This program is free software. See attached LICENSE.

*******************************************************************************/

/*******************************************************************************
MLInvoice: web-pohjainen laskutusohjelma.
Copyright (C) 2010-2012 Ere Maijala

Tämä ohjelma on vapaa. Lue oheinen LICENSE.

*******************************************************************************/

// Convert database format to user-readable
function dateConvDBDate2Date($intDate) 
{
  if (!$intDate)
    return '';
  $day = substr($intDate, 6);
  $mon = substr($intDate, 4, 2);
  $year = substr($intDate, 0, 4);
  return date($GLOBALS['locDateFormat'], mktime(0, 0, 0, $mon, $day, $year));
}

// Convert user-readable format to database
function dateConvDate2DBDate($strDate) 
{
  $arr = date_parse_from_format($GLOBALS['locDateFormat'], $strDate);
  return sprintf('%04d%02d%02d', $arr['year'], $arr['month'], $arr['day']);
}

// Convert the user-readable date to unix time
function strDate2UnixTime($strDate) 
{
  $arr = date_parse_from_format($GLOBALS['locDateFormat'], $strDate);
  return mktime(0, 0, 0, $arr['month'], $arr['day'], $arr['year']); 
}
