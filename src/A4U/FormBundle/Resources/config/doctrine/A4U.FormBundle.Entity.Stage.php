<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'fieldName' => 'id',
   'type' => 'integer',
   'id' => true,
   'columnName' => 'id',
  ));
$metadata->mapField(array(
   'columnName' => 'name',
   'fieldName' => 'name',
   'type' => 'string',
   'length' => '128',
  ));
$metadata->mapField(array(
   'columnName' => 'surname',
   'fieldName' => 'surname',
   'type' => 'string',
   'length' => '128',
  ));
$metadata->mapField(array(
   'columnName' => 'birth_place',
   'fieldName' => 'birthPlace',
   'type' => 'string',
   'length' => '128',
  ));
$metadata->mapField(array(
   'columnName' => 'birth_date',
   'fieldName' => 'birthDate',
   'type' => 'datetimetz',
  ));
$metadata->mapField(array(
   'columnName' => 'address',
   'fieldName' => 'address',
   'type' => 'string',
   'length' => '255',
  ));
$metadata->mapField(array(
   'columnName' => 'cap',
   'fieldName' => 'cap',
   'type' => 'string',
   'length' => '32',
  ));
$metadata->mapField(array(
   'columnName' => 'city',
   'fieldName' => 'city',
   'type' => 'string',
   'length' => '128',
  ));
$metadata->mapField(array(
   'columnName' => 'fiscal_code',
   'fieldName' => 'fiscalCode',
   'type' => 'string',
   'length' => '128',
  ));
$metadata->mapField(array(
   'columnName' => 'attended_school',
   'fieldName' => 'attendedSchool',
   'type' => 'string',
   'length' => '255',
  ));
$metadata->mapField(array(
   'columnName' => 'school_year',
   'fieldName' => 'schoolYear',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'email',
   'fieldName' => 'email',
   'type' => 'string',
   'length' => 255,
  ));
$metadata->mapField(array(
   'columnName' => 'phone',
   'fieldName' => 'phone',
   'type' => 'string',
   'length' => '64',
  ));
$metadata->mapField(array(
   'columnName' => 'facebook_contact',
   'fieldName' => 'facebookContact',
   'type' => 'string',
   'length' => 255,
  ));
$metadata->mapField(array(
   'columnName' => 'stage_period',
   'fieldName' => 'stagePeriod',
   'type' => 'string',
   'length' => '128',
  ));
$metadata->mapField(array(
   'columnName' => 'study_field',
   'fieldName' => 'studyField',
   'type' => 'string',
   'length' => '128',
  ));
$metadata->mapField(array(
   'columnName' => 'money_payed',
   'fieldName' => 'moneyPayed',
   'type' => 'string',
   'length' => '128',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);