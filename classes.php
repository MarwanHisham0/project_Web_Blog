                  
<?php



abstract class User
{
    public $id;
    public $Name;
    public $Email;
    public $Phone;
    public $image;
    protected $Password;
    public $created_at;
    public $updated_at;
    public $like;
    public $dislike;



    function __construct($id, $Name, $Email, $Password, $Phone, $image, $like, $dislike, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->Name = $Name;
        $this->Email = $Email;
        $this->Password = $Password;
        $this->Phone = $Phone;
        $this->image = $image;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->like = $like;
        $this->dislike = $dislike;
    }


    public static function login($Email, $Password)
    {
        $user = null;
        $qry = "SELECT * FROM USERS WHERE email='$Email' AND password='$Password'";
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn, $qry);
        if ($arr = mysqli_fetch_assoc($rslt)) {
            switch ($arr["role"]) {
                case 'subscriber':
                    $user = new Subscriber($arr["id"], $arr["Name"], $arr["Email"], $arr["Password"], $arr["Phone"], $arr["image"], $arr["like"], $arr["dislike"], $arr["created_at"], $arr["updated_at"]);
                    break;
                case 'admin':
                    $user = new Admin($arr["id"], $arr["Name"], $arr["Email"], $arr["Password"], $arr["Phone"], $arr["image"], $arr["like"], $arr["dislike"], $arr["created_at"], $arr["updated_at"]);
                    break;
            }
        }
        mysqli_close($cn);
        return $user;
    }
}



class  Subscriber extends User
{

    public $role = "subscriber";

    public static function register($Name, $Email, $Password, $Phone)
    {
        $qry = "INSERT INTO USERS (Name,email,Password,Phone) 
    VALUES('$Name','$Email','$Password','$Phone')";

        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn, $qry);
        mysqli_close($cn);
        return $rslt;
    }
    //posts
    public function store_post($title, $content, $imageName, $user_id)
    {

        $qry = "INSERT INTO POSTS(title,content,image,user_id)  values('$title','$content','$imageName',$user_id)";

        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn, $qry);
        mysqli_close($cn);
        return $rslt;
    }
    //comment
    public function store_comment($comment, $user_id, $post_id)
    {

        $qry = "INSERT INTO Comments (comment,user_id,post_id)  values('$comment',$user_id,$post_id)";

        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn, $qry);
        mysqli_close($cn);
        return $rslt;
    }
    // my_posts
    public function my_posts($user_id)
    {
        $qry = "SELECT * FROM POSTS WHERE USER_ID=$user_id ORDER BY CREATED_AT DESC";
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($cn);
        return $data;
    }
    // home_posts
    public function home_posts()
    {
        $qry = "SELECT * FROM POSTS  ORDER BY POSTS.CREATED_AT DESC LIMIT 10";
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($cn);
        return $data;
    }
    //update_profile
    public function update_profile($imageName, $user_id)
    {
        $qry = "UPDATE  USERS SET IMAGE= '$imageName' WHERE  id =$user_id";
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn, $qry);
        mysqli_close($cn);
        return $rslt;
    }
    //get_comment
    public function get_post_comment($post_id)
    {
        $qry = "SELECT * FROM Comments join USERS on Comments.user_id=USERS.id WHERE POST_ID=$post_id ORDER BY Comments.CREATED_AT DESC";
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($cn);
        return $data;
    }
    // my_posts
    public function like_posts($post_id)
    {
        $qry = "SELECT * FROM POSTS WHERE USER_ID=$post_id ORDER BY CREATED_AT DESC";
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($cn);
        return $data;
    }
}
class Admin  extends User
{


    public $role = "admin";

    //get_all_users
    function get_all_users()
    {
        $qry = "SELECT * FROM USERS   ORDER BY CREATED_AT ";
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($cn);
        return $data;
    }
    // home_posts_admin
    public function home_posts()
    {
        $qry = "SELECT * FROM POSTS  ORDER BY POSTS.CREATED_AT DESC LIMIT 10";
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($cn);
        return $data;
    }
    //get_comment_admin
    public function get_post_comment($post_id)
    {
        $qry = "SELECT * FROM Comments join USERS on Comments.user_id=USERS.id WHERE POST_ID=$post_id ORDER BY Comments.CREATED_AT DESC";
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn, $qry);
        $data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        mysqli_close($cn);
        return $data;
    }



    public function Delete_Account($user_id)
    {
        $qry = "DELETE FROM USERS WHERE id = $user_id";
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn, $qry);

        mysqli_close($cn);
        return $rslt;
    }
}
