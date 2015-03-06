<?php


namespace Chargify\Resource;

class AllocationResource extends AbstractResource {
  // Additional line item fields
  public $component_id;
  public $subscription_id;
  public $quantity;
  public $previous_quantity;
  public $memo;
  public $timestamp;
  public $proration_upgrade_scheme;
  public $proration_downgrade_scheme;

  public function getName() {
    return 'allocation';
  }

}