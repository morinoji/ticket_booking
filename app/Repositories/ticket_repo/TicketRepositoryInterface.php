<?php
namespace App\Repositories\ticket_repo;

use App\Repositories\BaseRepositoryInterface;

interface TicketRepositoryInterface extends BaseRepositoryInterface
{
    public function getTickets($search,$dateRange,$status,$route);
}
