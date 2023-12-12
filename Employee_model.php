<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model {

  function getEmployees($postData=null){

      $response = array();

      ## Read value
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      $searchValue = $postData['search']['value']; // Search value

      ## Search 
      $searchQuery = "";
      if($searchValue != ''){
          $searchQuery = " (hostname like '%".$searchValue."%' or 
                ipadd like '%".$searchValue."%' or db_type like '%".$searchValue."%' or 
                vipadd like'%".$searchValue."%' ) ";
      }

      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $records = $this->db->get('tbl_inventory')->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $this->db->select('count(*) as allcount');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $records = $this->db->get('tbl_inventory')->result();
      $totalRecordwithFilter = $records[0]->allcount;

      
      ## Fetch records
      $this->db->select('*');
      if($searchQuery != '')
      $this->db->where($searchQuery);
      $this->db->order_by($columnName, $columnSortOrder);
      $this->db->limit($rowperpage, $start);
      $records = $this->db->get('tbl_inventory')->result();

      $data = array();

      foreach($records as $record ){
         
          $data[] = array( 
              "hostname"=>$record->hostname,
              "ipadd"=>$record->ipadd,
              "vipadd"=>$record->vipadd,
              "db_type"=>$record->db_type,
              "db_name"=>$record->db_name,
			  "db_version"=>$record->db_version,
			  "os_type"=>$record->os_type
          ); 
      }

      ## Response
      $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordwithFilter,
          "aaData" => $data
      );

      return $response; 
  }

}