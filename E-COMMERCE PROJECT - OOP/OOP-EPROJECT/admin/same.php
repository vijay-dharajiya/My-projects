<?php
	class dbconnect{
		private $dbhost ;
		private $dbroot ;
		private $dbpass ;
		private $dbname ;
		public $cn ;
		
		function __construct(){
			$this->dbhost = "sql211.infinityfree.com";
			$this->dbroot = "if0_41251801" ;
			$this->dbpass = "vijaystore17517" ;
			$this->dbname = "if0_41251801_oop_project";
			$this->cn = mysqli_connect($this->dbhost, $this->dbroot, $this->dbpass, $this->dbname);
		}
	}


	//========================================= 		Insert Data 		================================================
	class mydb{

		function adddata($cn,$tblname,$fldlist){

			$fdata="";
			foreach ($fldlist as $k => $v) {
				
				$fdata.="$k='$v',";// last , che a loop fare m dar vakhat navi column nu name ane value add kartu jay table ma jetli 						column hoy tya sudhi last ma , vadhe ex : //cname='$catagory' ,
			}
			$fdata=trim($fdata,",");// trim is use for last , removel that is compalsary ex:cname='$catagory' , cnumber='$number'

			mysqli_query($cn,"INSERT INTO $tblname set $fdata");
		}
		//=======================================			Update Data 		=================================================

		function updatedata($cn ,$tblname, $fldlist, $condition){ 

			$fdata="";								// updatedata("catagories","","where cid='$cid'")
			foreach ($fldlist as $k => $v) {
				
				$fdata.="$k='$v',";

			}
			$fdata=trim($fdata,",");

			mysqli_query($cn,"UPDATE $tblname set $fdata $condition");	
		} 
		//=======================================			Delete Data 		=================================================

		function deldata($cn,$tblname,$condition){		//deldata("catagories","where cid='$cid'")

			mysqli_query($cn,"DELETE from $tblname $condition");

		}
		//=======================================			View Data 			==================================================

		function getdata($cn,$tblname,$fldlist,$condition,$ord){
			//getdata("catagories","cid,cname","where cid='$cid'","order by cname");
			
			 return mysqli_query($cn ,"SELECT $fldlist From $tblname $condition $ord");
		}
	}

?>