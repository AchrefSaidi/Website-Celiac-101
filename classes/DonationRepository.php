<?php
include_once 'autoload.php';

class DonationRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('donation');
    }
  }
