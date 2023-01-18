<?php 

// transfer this to gw_helpers
// change name to gw_set_status($status)

use App\Models\RequestModel;

function set_status($status)
{
    switch($status)
    {
        //ASSET STATUS
        case 'For Deployment': $bg = 'bg-warning'; break;
        case 'For Delivery': $bg = 'bg-warning'; break;
        case 'Used': $bg = 'bg-secondary'; break;
        case 'Deployed': $bg = 'bg-secondary'; break;
        case 'Available': $bg = 'bg-success'; break;
        case 'Delivered': $bg = 'bg-secondary'; break;
        case 'For Schedule': $bg = 'bg-info'; break;
        case 'For Warranty': $bg = 'bg-danger'; break;
        // PRIO STATUS
        case 'Low':         $bg = 'bg-secondary';  break;
        case 'Normal':      $bg = 'bg-primary'; break;
        case 'Critical':    $bg = 'bg-danger'; break;
        case 'Urgent':      $bg = 'bg-warning';  break;

        // REQUEST STATUS
        case 'Not yet started': $bg = 'bg-secondary'; break;
        case 'In-progress':     $bg = 'bg-warning'; break;
        case 'Suspend':     $bg = 'bg-secondary'; break;
        case 'For Confirmation':    $bg = 'bg-warning'; break;
        case 'For Follow-up':   $bg = 'bg-danger'; break;
        case 'For Approval': $bg = 'bg-danger'; break;
        case 'Done': $bg = 'bg-success'; break;
        case 'New': $bg = 'bg-secondary'; break;
        case 'Closed': $bg = 'bg-success'; break;
        case 'Modified': $bg = 'bg-info'; break;
        case 'Requested': $bg = 'bg-danger'; break;
        case 'Reserved': $bg = 'bg-warning'; break;
        case 'With PO': $bg = 'bg-warning'; break;
         
        // ORDER STATUS
         case 'PO Created': 
                    $bg = 'bg-secondary'; 
                    break;

        case 'Waiting for Availability': 
                    $bg = 'bg-warning';
                    break;

        case 'Waiting for Delivery': 
                    $bg = 'bg-primary'; 
                    break;

        case 'Sending Docs to Suppier': 
                    $bg = 'bg-danger'; 
                    break;       
        
        case 'Partial Delivered': 
            $bg = 'bg-danger'; 
            break;       
            

        case 'Closed': 
            $bg = 'bg-secondary'; 
            break; 

        default: $bg = 'bg-info';

    }
    
    return "<span class='badge {$bg}'>{$status}</span>";
}


// kunng unsa status sa Request, matic na moreflect sa view
// no need na magcreate another status for ORder
// so bale ang update sa order status, nasa Request na tanan....
function get_request_status($requestid)
{
    $rq = new RequestModel();
    $result =$rq->where('id', $requestid)->findAll();
    $status = ( count($result) != 0) ? $result[0]->status : NULL;
    return $status;

}


?>