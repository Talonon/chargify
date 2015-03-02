<?php


  namespace Chargify\Resource;

  class MetadataResource extends AbstractResource {
    public $resource_id;
    public $name;
    public $value;

    public function getFilter() {
      return array();
    }

    public function getName() {
      return 'metadata';
    }
  }