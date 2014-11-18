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
   'length' => 255,
  ));
$metadata->mapField(array(
   'columnName' => 'phone',
   'fieldName' => 'phone',
   'type' => 'string',
   'length' => '64',
  ));
$metadata->mapField(array(
   'columnName' => 'birth_date',
   'fieldName' => 'birthDate',
   'type' => 'datetimetz',
  ));
$metadata->mapField(array(
   'columnName' => 'birth_place',
   'fieldName' => 'birthPlace',
   'type' => 'string',
   'length' => '128',
  ));
$metadata->mapField(array(
   'columnName' => 'attended_school',
   'fieldName' => 'attendedSchool',
   'type' => 'string',
   'length' => 255,
  ));
$metadata->mapField(array(
   'columnName' => 'attended_school_city',
   'fieldName' => 'attendedSchoolCity',
   'type' => 'string',
   'length' => '128',
  ));
$metadata->mapField(array(
   'columnName' => 'has_attended_to_other_activities',
   'fieldName' => 'hasAttendedToOtherActivities',
   'type' => 'boolean',
  ));
$metadata->mapField(array(
   'columnName' => 'activity',
   'fieldName' => 'activity',
   'type' => 'object',
  ));
$metadata->mapField(array(
   'columnName' => 'other_activity',
   'fieldName' => 'otherActivity',
   'type' => 'string',
   'length' => 255,
  ));
$metadata->mapField(array(
   'columnName' => 'reference',
   'fieldName' => 'reference',
   'type' => 'object',
  ));
$metadata->mapField(array(
   'columnName' => 'other_reference',
   'fieldName' => 'otherReference',
   'type' => 'string',
   'length' => 255,
  ));
$metadata->mapField(array(
   'columnName' => 'unicam_course',
   'fieldName' => 'unicamCourse',
   'type' => 'object',
  ));
$metadata->mapField(array(
   'columnName' => 'submission_date',
   'fieldName' => 'submissionDate',
   'type' => 'datetimetz',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);