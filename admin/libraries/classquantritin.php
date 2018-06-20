<?php 
require_once "../libraries/classDB.php";
class quantritin extends DB {
	function Detail_user($u,$p){
		$u=$this->db->escape_string($u);
		$p=$this->db->escape_string($p);
		$p=md5($p);
		$sql="select * from users where username='$u' And password='$p'";
		$kq=$this->db->query($sql);
		if($kq->num_rows==0)
			return false;
		else return $kq->fetch_assoc();
	}//end detail_user

	function DangNhap(){
			//$error=array();
		$u=trim($_POST['username']);
		$p=trim($_POST['pass']);
		$kq=$this->Detail_user($u,$p);
		if($kq){
			$_SESSION['login_id']=$kq['idUser'];
			$_SESSION['login_user']=$kq['Username'];
			$_SESSION['login_pass']=$kq['Password'];
			$_SESSION['login_hoten']=$kq['HoTen'];
			$_SESSION['login_email']=$kq['Email'];
			$_SESSION['login_group']=$kq['idGroup'];
			$_SESSION['login_active']=$kq['active'];
			if(isset($_POST['rem'])==true)
			{
				setcookie("un",$_POST['username'],time()+60*60*24*7);
				setcookie("pw",$_POST['pass'],time()+60*60*24*7);
				setcookie("gr",$_SESSION['login_group'],time()+60*60*24*7);
				setcookie("ht",$_SESSION['login_hoten'],time()+60*60*24*7);
				setcookie("em",$_SESSION['login_email'],time()+60*60*24*7);
				setcookie("active",$_SESSION['login_active'],time()+60*60*24*7);
			}
			else{
				setcookie("un",$_POST['username'],time()-1);
				setcookie("pw",$_POST['pass'],time()-1);
				setcookie("gr",$_SESSION['login_group'],time()-1);
				setcookie("ht",$_SESSION['login_hoten'],time()-1);
				setcookie("ht",$_SESSION['login_hoten'],time()-1);
				setcookie("active",$_SESSION['login_active'],time()-1);
			}
			if(strlen($_SESSION['back'])>0)
			{
				$back =$_SESSION['back'];
				unset ($_SESSION['back']);
				header("location:$back");
			}
			else header("location:index.php");
		}
		else
		{ 
					//	$error=;
			$_SESSION['error']="<p class='alert alert-warning'>Tên Đăng Nhập Hoặc Mật Khẩu Của Bạn Không Đúng !</p>";
			header("location:login.php");

		}
	}//end Function DangNhap()

	function checkLogin(){
		if(!isset($_SESSION['login_group']))
		{
			$_SESSION['back']=$_SERVER['REQUEST_URL'];
			header('location:login.php');
			exit();
		}
		else if($_SESSION['login_group']!=1||$_SESSION['login_active']!=1)
		{
			$_SESSION['error']='Bạn Không Có Quyền Truy Cập Trang Này';
			$_SESSION['back']=$_SERVER['REQUEST_URL'];
			header('location:login.php');
			exit();
		}
	}//End Function CheckLogin();

	function changeTitle($str){
		$str = $this->stripUnicode($str);
		$str = str_replace("?","",$str);
		$str = str_replace("&","",$str);
		$str = str_replace("'","",$str);
		$str = str_replace('"',"",$str);
		$str = str_replace("\\","",$str);
		$str = str_replace(":","",$str);
		$str = str_replace("%","",$str);
		$str = str_replace("+","",$str);
		$str = str_replace("-","",$str);
		$str = trim($str);		
		while (strpos($str,'  ')>0) $str = str_replace("  "," ",$str);
		$str = mb_convert_case($str , MB_CASE_LOWER , 'utf-8');
			// MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
		$str = str_replace(" ","-",$str);	
		return $str;
	}//end  changeTitle

	function stripUnicode($str){
		if(!$str) return false;
		$unicode = array(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'd'=>'đ',
			'D'=>'Đ',
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'i'=>'í|ì|ỉ|ĩ|ị',	  
			'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
		);
		foreach($unicode as $khongdau=>$codau) {
			$arr = explode("|",$codau);
			$str = str_replace($arr,$khongdau,$str);
		}
		return $str;
	}//end stripUnicode()

	function ThemTheLoai(&$loi){
		$thanhcong=true;
		$TenTL=$_POST['TenTL'];
		$lang=$_POST['lang'];
		$ThuTu=$_POST['ThuTu'];
		$AnHien=$_POST['AnHien'];
		settype($ThuTu,"int");
		settype($AnHien,"int");
		$TenTL=$this->db->escape_string(trim(strip_tags($TenTL)));
		$lang=$this->db->escape_string(trim(strip_tags($lang)));
		$TenTL_KhongDau=$this->changeTitle($TenTL);
		if($TenTL==NULL){
			$thanhcong=false;
			$loi['tentl']='Vui Lòng Nhập Tên Thể Loại';
		}
		else if($this->CheckTheLoai($TenTL)==false){
			$thanhcong=false;
			$loi['tentl']='Tên Thể Loại Đã Tồn Tại';
		}
		if($thanhcong==true){
			$sql="insert into theloai values(NULL,'$lang','$TenTL','$TenTL_KhongDau',$ThuTu,$AnHien) ";
			$kq=$this->db->query($sql);
			if(!$kq) die($this->db->error);
				}//thanh cong
				return $thanhcong;
	}// End ThemTheLoai

	function ListTheLoai(){
		$sql="select * from theloai order by ThuTu ASC" ;
		$query=$this->db->query($sql);
		return $query;
	}//End ListTheLoai()

	function ListTheLoai_lang($lang){
		$sql="select * from theloai where lang='$lang'" ;
		$query=$this->db->query($sql);
		return $query;
	}//End ListTheLoai()

	function CheckTheLoai($TenTL){
		$sql="Select TenTL From theloai where TenTL='$TenTL'";
		$kq=$this->db->query($sql) or die ($this->db->error());
		if($kq->num_rows>0)
			return false;
		else return true;
	}//end CheckTheLoai
	function Detail_Theloai($idTL){
		$sql="select * from theloai where idTL=$idTL";
		$kq=$this->db->query($sql);
		if(!$kq) die($this->db->error);
		return $kq;
	}//end Detail_Theloai

	function Edit_TheLoai($idTL){
		$TenTL=$_POST['TenTL'];
		$lang=$_POST['lang'];
		$ThuTu=$_POST['ThuTu'];
		$AnHien=$_POST['AnHien'];
		settype($ThuTu,"int");
		settype($AnHien,"int");
		settype($idTL,"int");
		$TenTL=$this->db->escape_string(trim(strip_tags($TenTL)));
		$lang=$this->db->escape_string(trim(strip_tags($lang)));
		$TenTL_KhongDau=$this->changeTitle($TenTL);
		$sql="update theloai set lang='$lang',TenTL='$TenTL',TenTL_KhongDau='$TenTL_KhongDau',ThuTu=$ThuTu,AnHien=$AnHien where idTL=$idTL";
		$kq=$this->db->query($sql);
		if(!$kq) die($this->db->error);
	}//END Edit_TheLoai

	function Delete_TL($idTL){
		settype($idTL,"int");
		$sql="SELECT COUNT(*) solt FROM loaitin WHERE idTL=$idTL";
		$kq=$this->db->query($sql);
		$rs=$kq->fetch_row();
		if($rs[0]>0){
			$_SESSION['loi']='Thể Loại Chứa Nhiều Loại Tin,Không Thể Xóa ';
			header("location:index.php?p=theloai_list");
			exit();
		}
		else{
			$sql="delete from theloai where idTL=$idTL";
			$kq=$this->db->query($sql);
			if(!$kq) die($this->db->error);
			$_SESSION['thanhcong']='Thể Loại Đã Được Xóa';
		}
     }// end  Delete_TL

     function ListLoaiTin(){
     	$sql="select idLT,Ten,Ten_KhongDau,loaitin.ThuTu,loaitin.AnHien,TenTL,loaitin.lang from loaitin, theloai Where loaitin.idTL=theloai.idTL order by loaitin.ThuTu" ;
     	$kq=$this->db->query($sql);
     	if(!$kq) die($this->db->error);
     	return $kq;
	}//End ListLoaiTin()

	function ThemLoaiTin(&$loi){
		$thanhcong=true;
		$idTL=$_POST['idTL'];
		$TenLT=$_POST['TenLT'];
		$lang=$_POST['lang'];
		$ThuTu=$_POST['ThuTu'];
		$AnHien=$_POST['AnHien'];
		settype($ThuTu,"int");
		settype($AnHien,"int");
		settype($idTL,"int");
		$TenLT=$this->db->escape_string(trim(strip_tags($TenLT)));
		$lang=$this->db->escape_string(trim(strip_tags($lang)));
		$Ten_KhongDau=$this->changeTitle($TenLT);
		if($TenLT==NULL){
			$thanhcong=false;
			$loi['tenlt']='Vui Lòng Nhập Tên Loại Tin';
		}
		else if($this->CheckLoaiTin($TenLT)==false){
			$thanhcong=false;
			$loi['tenlt']='Tên Thể Loại Đã Tồn Tại';
		}
		if($thanhcong==true){
			$sql="insert into loaitin values(NULL,'$lang','$TenLT','$Ten_KhongDau',$ThuTu,$AnHien,$idTL) ";
			$kq=$this->db->query($sql);
			if(!$kq) die($this->db->error);
				}//thanh cong
				return $thanhcong;
	}// End ThemLoaiTin
	function Edit_LoaiTin($idLT){
		$idTL=$_POST['idTL'];
		$TenLT=$_POST['TenLT'];
		$lang=$_POST['lang'];
		$ThuTu=$_POST['ThuTu'];
		$AnHien=$_POST['AnHien'];
		settype($ThuTu,"int");
		settype($AnHien,"int");
		settype($idTL,"int");
		$TenLT=$this->db->escape_string(trim(strip_tags($TenLT)));
		$lang=$this->db->escape_string(trim(strip_tags($lang)));
		$Ten_KhongDau=$this->changeTitle($TenLT);				
		$sql="update loaitin set lang='$lang',Ten='$TenLT',Ten_KhongDau='$Ten_KhongDau',ThuTu=$ThuTu,AnHien=$AnHien,idTL=$idTL where idLT=$idLT";
		$kq=$this->db->query($sql);
		if(!$kq) die($this->db->error);
		return $kq;
	}// End EditLoaiTin
	function CheckLoaiTin($TenLT){
		$sql="Select Ten From loaitin where Ten='$TenLT'";
		$kq=$this->db->query($sql) or die ($this->db->error());
		if($kq->num_rows>0)
			return false;
		else return true;
	}//end CheckLoaTin
	function Detail_Loaitin($idLT){
		$sql="select * From loaitin where idLT=$idLT";
		$kq=$this->db->query($sql) or die ($this->db->error());;
		return $kq;
	}
	function Delete_LoaiTin($idLT){
		settype($idLT,"int");
		$sql="SELECT COUNT(*) sotin FROM tin WHERE idLT=$idLT";
		$kq=$this->db->query($sql);
		$rs=$kq->fetch_row();
		if($rs[0]>0){
			$_SESSION['loi']='Loại Tin Chứa Nhiều Tin,Không Thể Xóa ';
			header("location:index.php?p=loaitin_list");
			exit();
		}
		else{
			$sql="delete from loaitin where idLT=$idLT";
			$kq=$this->db->query($sql) or die ($this->db->error());
			$_SESSION['thanhcong']='Loại Tin Đã Được Xóa';
		}
	}

	function Tin_List(){
		$sql="select idTin,TieuDe,TomTat,urlHinh,Ngay,Ten,TenTL from tin,loaitin,theloai where tin.idLT=loaitin.idLT AND loaitin.idTL=theloai.idTL Order By idTin DESC";
		$kq=$this->db->query($sql) or die ($this->db->error());
		return $kq;
	}

	function Tin_del($idTin){
		settype($idTin,"int");
		$sql="delete from tin where idTin=$idTin";
		$kq=$this->db->query($sql) or die ($this->db->error());
		return $kq;
	}
	function LoaiTrongTL($idTL){
		settype($idTL,"int");
		$sql="Select * from loaitin where idTL=$idTL";
		$kq=$this->db->query($sql) or die ($this->db->error());
		return $kq;
	}

	function Tin_add(&$loi){
		$thanhcong=true;
		$TieuDe=$this->db->escape_string(trim(strip_tags($_POST['tieude'])));
		$lang=$this->db->escape_string(trim(strip_tags($_POST['lang'])));
		$idLT=$_POST['idLT'];
		$TomTat=$_POST['tomtat'];
		$noidung=$_POST['noidung'];
		if($noidung==NULL){
			$thanhcong=false;
			$loi['nd']="Vui Lòng Nhập Nội Dung";
		}
		$AnHien=$_POST['AnHien'];
		$NoiBat=$_POST['NoiBat'];
		settype($idLT,"int");
		settype($AnHien,"int");
		settype($NoiBat,"int");
		$TieuDe_KhongDau=$this->changeTitle($TieuDe);
		if(isset($_FILES['urlHinh']))
			$dir='../dataupload/images/';
		$urlHinh=$_FILES['urlHinh']['name'];
		$dir.=$urlHinh;
		$urlHinh1="dataupload/images/".$urlHinh;
		if($thanhcong==true){
			$_SESSION['thanhcong']='1 tin đã được thêm';
			move_uploaded_file($_FILES['urlHinh']['tmp_name'],$dir);
			$sql="Insert into tin set lang='$lang',TieuDe='$TieuDe',TieuDe_KhongDau='$TieuDe_KhongDau',TomTat='$TomTat',urlHinh='$urlHinh1',Ngay=now(),Content='$noidung',idUser={$_SESSION['login_id']},idLT=$idLT,TinNoiBat=$NoiBat,AnHien=$AnHien,idSK=0";
			$kq=$this->db->query($sql) or die ($this->db->error());
		}
		return $thanhcong;
	}

	function Tin_Detail($idTin){
		settype($idTin,"int");
		$sql="select * from tin where idTin=$idTin";
		$kq=$this->db->query($sql) or die ($this->db->error());
		return $kq;
	}

	function LayTL_edit($idTin){
		$sql="select theloai.idTL from tin ,loaitin,theloai where tin.idLT=loaitin.idLT AND loaitin.idTL=theloai.idTL And idTin=$idTin";
		$kq=$this->db->query($sql) or die ($this->db->error());
		return $kq;
	}

	function Tin_edit($idTin,&$loi){
		$thanhcong=true;
		$TieuDe=$this->db->escape_string(trim(strip_tags($_POST['tieude'])));
		$lang=$this->db->escape_string(trim(strip_tags($_POST['lang'])));
		$idLT=$_POST['idLT'];
		$TomTat=$_POST['tomtat'];
		$noidung=$_POST['noidung'];
		if($noidung==NULL){
			$thanhcong=false;
			$loi['nd']="Vui Lòng Nhập Nội Dung";
		}
		$AnHien=$_POST['AnHien'];
		$NoiBat=$_POST['NoiBat'];
		settype($idLT,"int");
		settype($AnHien,"int");
		settype($NoiBat,"int");
		$TieuDe_KhongDau=$this->changeTitle($TieuDe);
		if(isset($_FILES['urlHinh'])&&$_FILES['urlHinh']!=""){
			$dir='../upload/';
			$urlHinh=$_FILES['urlHinh']['name'];
			$dir.=$urlHinh;
			move_uploaded_file($_FILES['urlHinh']['tmp_name'],$dir);
		}
		else
			$urlHinh=$_POST['hinh'];
		if($thanhcong==true){
			$_SESSION['thanhcong']='1 tin đã được thay đổi';

			$sql="update tin set lang='$lang',TieuDe='$TieuDe',TieuDe_KhongDau='$TieuDe_KhongDau',TomTat='$TomTat',urlHinh='$urlHinh',Ngay=now(),Content='$noidung',idUser={$_SESSION['login_id']},idLT=$idLT,TinNoiBat=$NoiBat,AnHien=$AnHien,idSK=0 where idTin=$idTin";
			$kq=$this->db->query($sql) or die ($this->db->error());
		}
		return $thanhcong;
	}

	function BL_list(){
		$sql="Select * from bandocykien ";
		$kq=$this->db->query($sql) or die ($this->db->error());
		return $kq;
	}

	function BL_del($idYKien){
		$sql="delete from bandocykien where idYKien=$idYKien";
		$kq=$this->db->query($sql) or die ($this->db->error());
		$_SESSION['thanhcong']='Bình Luận Đã Được Xóa';
		return $kq;
	}

	function BL_detail($idYKien){
		$sql="select * from bandocykien where idYKien=$idYKien";
		$kq=$this->db->query($sql) or die ($this->db->error());
		return $kq;
	}

	function BL_edit($idYKien){
		$noidung=$this->db->escape_string(trim(strip_tags($_POST['noidung'])));
		$anhien=$_POST['AnHien'];
		$sql="update bandocykien set NoiDung='$noidung',Duyet=$anhien where idYKien=$idYKien";
		$kq=$this->db->query($sql);
		if(!$kq) die($this->db->error);
		return $kq;
	}

	function User_List(){
		$sql="Select * from users";
		$kq=$this->db->query($sql);
		if(!$kq) die($this->db->error);
		return $kq;
	}

	function User_Del($idUser){
		if($_SESSION['login_id']!=1){
			$_SESSION['loi']="bạn không có quyền hạn này";
			header("location:index.php?p=user_list");
		}
		if($idUser==1)
		{
			$_SESSION['loi']="Đây là super admin. Không Thể Xóa!!!";
			header("location:index.php?p=user_list");
		}
		else
		{
			$sql="delete from users where idUser=$idUser";
			$kq=$this->db->query($sql);
			if(!$kq) die($this->db->error);
			$_SESSION['thanhcong']="Đã xóa User !";
		}
	}
}//End class Quantritin
?>