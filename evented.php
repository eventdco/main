<?php

// Helper method to get a string description for an HTTP status code
// From http://www.gen-x-design.com/archives/create-a-rest-api-with-php/ 
function getStatusCodeMessage($status)
{
    // these could be stored in a .ini file and loaded
    // via parse_ini_file()... however, this will suffice
    // for an example
    $codes = Array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported'
    );
 
    return (isset($codes[$status])) ? $codes[$status] : '';
}
 
// Helper method to send a HTTP response code/message
function sendResponse($status = 200, $body = '', $content_type = 'text/html')
{
    $status_header = 'HTTP/1.1 ' . $status . ' ' . getStatusCodeMessage($status);
    header($status_header);
    header('Content-type: ' . $content_type);
    echo $body;
}

class eventedAPI {
	private $db;
	
	function __construct() {
		$this->db = new MySQLi("localhost", "root", "root", "evented");
	}
	
	function __destruct() {
		$this->db->close();
	}
	
    function executeStatement($stmt) {
        switch ($stmt) {
            case 'test':
                $this->test();
                break;
			case 'test_db':
                $this->test_db();
                break;
            case 'create_user':
                $this->create_user();
                break;
            case 'create_party':
                $this->create_party ();
                break;
            case 'get_party':
                $this->get_party ();
                break;
            case 'create_message':
                $this->create_message();
                break;
            case 'get_message':
                $this->get_message();
                break;
			default:
            {
                $result['response'] = "no such statement";
                sendResponse(400, json_encode($result));
            }
                break;
        }
    }
    
    function create_user() {
        
        $u_name = $_GET["u_name"];
        $u_type = $_GET["u_type"];
        $u_email = $_GET["u_email"];
        $u_phone = $_GET["u_phone"];
        $u_password = $_GET["u_password"];

        if(!isset($_GET["u_name"])||!isset($_GET["u_type"])||!isset($_GET["u_email"])||!isset($_GET["u_phone"])||!isset($_GET["u_password"])) {
            
            $result['response'] = "wrong input";
            sendResponse(200, json_encode($result));
            return;
            
        }
        
        $count = 0;
        $stmt = $this->db->prepare("select u_email from User where u_email = '$u_email'");
        $stmt->execute();
        $stmt->bind_result($mail_checker);
        while ($stmt->fetch()) {
            $count++;
        }
        $stmt->close();
        
        if($count>0) {
            $result['response'] = "email has been used";
            sendResponse(200, json_encode($result));
            return;
        }
        
        $this->db->query("insert into User (u_name, u_type, u_email, u_phone, u_password) values('$u_name', $u_type, '$u_email', '$u_phone', '$u_password')");
		$this->db->commit();
        
        $result['response'] = "create new user successfully";
        
        sendResponse(200, json_encode($result));

    }
    
    function create_party() {
        
        if(!isset($_GET["p_userID"])||!isset($_GET["p_plannerID"])||!isset($_GET["p_budget"])||!isset($_GET["p_type"])||!isset($_GET["p_people"])||!isset($_GET["p_description"])||!isset($_GET["p_location"])||!isset($_GET["p_time"])||!isset($_GET["p_status"])) {
            
            $result['response'] = "wrong input";
            sendResponse(200, json_encode($result));
            return;
            
        }
        
        $p_userID = $_GET["p_userID"];
        $p_plannerID = $_GET["p_plannerID"];
        $p_budget = $_GET["p_budget"];
        $p_type = $_GET["p_type"];
        $p_people = $_GET["p_people"];
        $p_description = $_GET["p_description"];
        $p_location = $_GET["p_location"];
        $p_time = $_GET["p_time"];
        $p_status = $_GET["p_status"];
        
        $this->db->query("insert into Party (p_userID, p_plannerID, p_budget, p_type, p_people, p_description, p_location, p_time, p_status, p_timestamp) values($p_userID, $p_plannerID, $p_budget, $p_type, $p_people, '$p_description', '$p_location', '$p_time', $p_status, now())");
		$this->db->commit();
        
        $result['response'] = "create new party successfully";
        
        sendResponse(200, json_encode($result));
    }
    
    function get_party() {
        
        $stmt = $this->db->prepare("select * from Party");
        $stmt->execute();
        $stmt->bind_result($p_id_result, $p_userID_result, $p_plannerID_result, $p_budget_result, $p_type_result, $p_people_result, $p_description_result, $p_location_result, $p_time_result, $p_status_result, $p_timestamp_result);
        while ($stmt->fetch()) {
            $single_result['p_id'] = $p_id_result;
            $single_result['p_userID'] = $p_userID_result;
            $single_result['p_plannerID'] = $p_plannerID_result;
            $single_result['p_budget'] = $p_budget_result;
            $single_result['p_type'] = $p_type_result;
            $single_result['p_people'] = $p_people_result;
            $single_result['p_description'] = $p_description_result;
            $single_result['p_location'] = $p_location_result;
            $single_result['p_time'] = $p_time_result;
            $single_result['p_status'] = $p_status_result;
            $single_result['p_timestamp'] = $p_timestamp_result;

            $result[] = $single_result;
        }
        $stmt->close();
        
        //$result['response'] = "get new party successfully";
        
        sendResponse(200, json_encode($result));
    }
    
    function create_message() {
        if(!isset($_GET["m_partyID"])||!isset($_GET["m_userID"])||!isset($_GET["m_content"])) {
            
            $result['response'] = "wrong input";
            sendResponse(200, json_encode($result));
            return;
            
        }
        
        $m_partyID = $_GET["m_partyID"];
        $m_userID = $_GET["m_userID"];
        $m_content = $_GET["m_content"];
        
        
        $this->db->query("insert into Message (m_partyID, m_userID, m_content, m_timestamp) values($m_partyID, $m_userID, '$m_content', now())");
		$this->db->commit();
        
        $result['response'] = "create new party successfully";
        
        sendResponse(200, json_encode($result));
    }
    
    function get_message() {
        
        $sqlStmt = "select * from Message";
        
        if(isset($_GET["m_partyID"])) {
            $m_partyID = $_GET["m_partyID"];
            $sqlStmt = "select * from Message where m_partyID = $m_partyID";
        }
        
        $stmt = $this->db->prepare($sqlStmt);
        $stmt->execute();
        $stmt->bind_result($m_id_result, $m_partyID_result, $m_userID_result, $m_content_result, $m_timestamp_result);
        while ($stmt->fetch()) {
            $single_result['m_id'] = $m_id_result;
            $single_result['m_partyID'] = $m_partyID_result;
            $single_result['m_userID'] = $m_userID_result;
            $single_result['m_content'] = $m_content_result;
            $single_result['m_timestamp'] = $m_timestamp_result;
            
            $result[] = $single_result;
        }
        $stmt->close();
        
        //$result['response'] = "get new party successfully";
        
        sendResponse(200, json_encode($result));
    }
    
	function test() {
        
        sendResponse(200, 'good test');

	}
    
    function test_db() {
        
        $stmt = $this->db->prepare("select test_id, test_name from test");
        $stmt->execute();
        $stmt->bind_result($result_id, $result_name);
        while ($stmt->fetch()) {
        $result[$result_id] = $result_name;
        }
        $stmt->close();
    
        sendResponse(200, json_encode($result));

    }
}

$api = new eventedAPI;
$api -> executeStatement($_GET["statement"]);

?>