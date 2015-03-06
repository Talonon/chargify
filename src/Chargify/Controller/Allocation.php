<?php

namespace Chargify\Controller;

use \Chargify\Resource\AllocationResource as Resource;

class Allocation extends AbstractController {

  /**
   * Get allocations for
   *
   * @param $subscriptionID int
   * @param $componentID int
   * @return Resource[] objects
   */
  public function getDefinitionsBySubscriptionAndComponent($subscriptionID, $componentID) {
    $allocations = array();
    // Get the raw data from Chargify.
    $response = $this->request('subscriptions/' . $subscriptionID . '/components/' . $componentID . '/allocations');

    // Convert the raw data into resource objects.
    foreach ($response as $data ) {
      if (is_array($data) && is_array($data['allocation'])) {
        $allocations[] = new Resource($data['allocation']);
      }
    }

    return $allocations;
  }

  /**
   * Create a new allocation.
   *
   * @param $subscriptionID int
   * @param $componentID int
   * @param $data array Keyed array of data according to API docs.
   * @return Resource Newly created chargify object.
   */
  public function create($subscriptionID, $componentID, $data) {
    $allocation = null;
    $response = $this->request('subscriptions/' . $subscriptionID . '/components/' . $componentID . '/allocations', $data, 'POST');
    if (is_array($response) && is_array($response['allocation'])) {
      $allocation = new Resource($response['allocation']);
    }
    return $allocation;
  }

}