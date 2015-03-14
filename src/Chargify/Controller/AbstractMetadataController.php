<?php

  namespace Chargify\Controller;

  use Chargify\Resource\MetadataResource as Resource;

  class AbstractMetadataController extends AbstractController {

    protected $resource = null;

    /**
     * Get all metadata.
     *
     * @return  metadata objects
     */
    public function getAll() {
      $metadata = array();
      // Get the raw data from Chargify.
      $response = $this->request($this->resource . '/metadata');

      // Convert the raw data into resource objects.
      foreach ($response as $data) {
        if (is_array($data)) {
          $metadata[] = new Resource($data);
        }
      }

      return $metadata;
    }

    /**
     * Read a metadata by id.
     *
     * @param $id The Chargify metadata ID.
     * @return A chargify metadata object.
     */
    public function getById($id) {
      $metadata = null;

      $response = $this->request($this->resource . '/' . $id . '/metadata');

      if (is_array($response) && is_array($response['metadata'])) {
        foreach ($response['metadata'] as $data) {
          if (is_array($data)) {
            $metadata[] = new Resource($data);
          }
        }
      }

      return $metadata;
    }

    /**
     * Create a new metadata.
     *
     * @param  $data Keyed array of data according to API docs.
     * @return  Newly created chargify object.
     */
    public function create($id, $data) {
      $metadata = [];

      $response = $this->request($this->resource . '/' . $id . '/metadata', $data, 'POST');

      if (is_array($response)) {
        foreach ($response as $data) {
          $metadata[] = new Resource($data);
        }
      }

      return $metadata;
    }


    /**
     * Update an existing metadata.
     *
     * @param $id The Chargify metadata ID.
     * @param  $data Keyed array of data according to API docs.
     * @return  Updated chargify object.
     */
    public function update($id, $data) {
      $metadata = [];

      $response = $this->request($this->resource . '/' . $id . '/metadata', $data, 'PUT');

      if (is_array($response)) {
        foreach ($response as $data) {
          $metadata[] = new Resource($data);
        }
      }

      return $metadata;
    }
  }