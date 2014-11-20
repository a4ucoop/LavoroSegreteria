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
   'columnName' => 'address',
   'fieldName' => 'address',
   'type' => 'string',
   'length' => 255,
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
   'columnName' => 'email',
   'fieldName' => 'email',
   'type' => 'string',
   'length' => '128',
  ));
$metadata->mapField(array(
   'columnName' => 'birthdate',
   'fieldName' => 'birthdate',
   'type' => 'datetimetz',
  ));
$metadata->mapField(array(
   'columnName' => 'birthplace',
   'fieldName' => 'birthplace',
   'type' => 'string',
   'length' => '128',
  ));
$metadata->mapField(array(
   'columnName' => 'fiscalcode',
   'fieldName' => 'fiscalcode',
   'type' => 'string',
   'length' => '128',
  ));
$metadata->mapField(array(
   'columnName' => 'submissiondate',
   'fieldName' => 'submissiondate',
   'type' => 'datetimetz',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);