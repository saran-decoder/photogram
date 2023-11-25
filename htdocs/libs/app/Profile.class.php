<?php

include_once __DIR__ . "/../traits/SQLGetterSetter.trait.php";

class Profile
{
    use SQLGetterSetter; //including a trait

    public $id;
    public $conn;
    public $table;

    public static function profile($avatar)
    {
        $id = Session::getUser()->getID();
        $owner = Session::getUser()->getUsername();
        $headid = md5(Session::getUser()->getUsername());
        if (is_file($avatar) && exif_imagetype($avatar) !== false) {
            $image_name = md5($owner . time()) . image_type_to_extension(exif_imagetype($avatar));
            $image_path = get_config('avatar_path') . $image_name;
            if (move_uploaded_file($avatar, $image_path)) {
                $avatar_path = "/ava/$image_name";
                $update_profile = "UPDATE `users` SET `avatar`='$avatar_path' WHERE `userid`='$id'";
                $db = Database::getConnection();
                if ($db->query($update_profile)) {
                    $update_postavatar = "UPDATE `posts` SET `avatar`='$avatar_path' WHERE `userid`='$id'";
                    if ($db->query($update_postavatar)) {
                        echo "<script>window.location.href = '/profile/{$owner}?savedavatars={$headid}'</script>";
                        return true;
                    } else {
                        echo "<script>window.location.href = '/profile/{$owner}?updatepostavatarerror'</script>";
                        return false;
                    }
                } else {
                    echo "<script>window.location.href = '/profile/{$owner}?updateavatarerror'</script>";
                    return false;
                }
            } else {
                throw new Exception("Profile avatar could not be moved.");
            }
        } else {
            echo "<script>window.location.href = '/profile/{$owner}'</script>";
        }
    }

    public static function profileinfo($user, $email, $phone, $bio)
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $owner = Session::getUser()->getUsername();
        $headid = md5(Session::getUser()->getUsername());
        $update_profile = "UPDATE `users` SET `owner`='$user', `bio`='$bio' WHERE `userid`='$id'";
        try {
            if ($db->query($update_profile)) {
                $u_profile ="UPDATE `auth` SET `username`='$user', `email`='$email', `phone`='$phone' WHERE `id`='$id'";
                if ($db->query($u_profile)) {
                    echo "<script>window.location.href = '/profile/{$owner}?savedprofileinfo={$headid}'</script>";
                    return true;
                } else {
                    echo "<script>window.location.href = '/profile/{$owner}?notsavesomeerror'</script>";
                    return false;
                }
            } else {
                echo "<script>window.location.href = '/profile/{$owner}?updatebioerror'</script>";
                return false;
            }
        } catch (Exception $e) {
            echo "<script>window.location.href = '/profile?{$e->getMessage()}'</script>";
            return false;
        }
    }

    public static function gender($gender)
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $owner = Session::getUser()->getUsername();
        $headid = md5(Session::getUser()->getUsername());
        $update_profile = "UPDATE `users` SET `gender`='$gender' WHERE `userid`='$id'";
        try {
            if ($db->query($update_profile)) {
                echo "<script>window.location.href = '/profile/{$owner}?savedgender={$headid}'</script>";
                return true;
            } else {
                echo "<script>window.location.href = '/profile/{$owner}?updategendererror'</script>";
                return false;
            }
        } catch (Exception $e) {
            echo "<script>window.location.href = '/profile?{$e->getMessage()}'</script>";
            return false;
        }
    }

    public static function dob($dob)
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $owner = Session::getUser()->getUsername();
        $headid = md5(Session::getUser()->getUsername());
        $update_profile = "UPDATE `users` SET `dob`='$dob' WHERE `userid`='$id'";
        try {
            if ($db->query($update_profile)) {
                echo "<script>window.location.href = '/profile/{$owner}?saveddob={$headid}'</script>";
                return true;
            } else {
                echo "<script>window.location.href = '/profile/{$owner}?updatedoberror'</script>";
                return false;
            }
        } catch (Exception $e) {
            echo "<script>window.location.href = '/profile?{$e->getMessage()}'</script>";
            return false;
        }
    }

    public static function newPassword($current_password, $password)
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $owner = Session::getUser()->getUsername();
        $headid = md5(Session::getUser()->getUsername());
        $query = "SELECT `password` FROM `auth` WHERE `id` = '$id'";
        $result = $db->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($current_password, $row['password'])) {
                $options = [
                    'cost' => 9,
                ];
                $password = password_hash($password, PASSWORD_BCRYPT, $options);
                $update_profile = "UPDATE `auth` SET `password`='$password' WHERE `id`='$id'";
                try {
                    if ($db->query($update_profile)) {
                        echo "<script>window.location.href = '/profile/{$owner}?savenewpass={$headid}'</script>";
                        return true;
                    } else {
                        echo "<script>window.location.href = '/profile/{$owner}?updatepasserror'</script>";
                        return false;
                    }
                } catch (Exception $e) {
                    echo "<script>window.location.href = '/profile?{$e->getMessage()}'</script>";
                    return false;
                }
            } else {
                echo "<script>window.location.href = '/profile/{$owner}?verifypasserror'</script>";
                return false;
            }
        } else {
            return false;
        }
    }

    public static function link($link)
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $owner = Session::getUser()->getUsername();
        $headid = md5(Session::getUser()->getUsername());
        $update_profile = "UPDATE `users` SET `link`='$link' WHERE `userid`='$id'";
        try {
            if ($db->query($update_profile)) {
                echo "<script>window.location.href = '/profile/{$owner}?savedlink={$headid}'</script>";
                return true;
            } else {
                echo "<script>window.location.href = '/profile/{$owner}?updatelinkerror'</script>";
                return false;
            }
        } catch (Exception $e) {
            echo "<script>window.location.href = '/profile?{$e->getMessage()}'</script>";
            return false;
        }
    }

    public static function getuserProfile()
    {
        $username = $_GET['username'];
        $db = Database::getConnection();
        $sql = "SELECT * FROM `users` WHERE `owner`='$username'";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }

    public static function getuserAuth()
    {
        $username = $_GET['username'];
        $db = Database::getConnection();
        $sql = "SELECT * FROM `auth` WHERE `username`='$username'";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }

    public static function getProfile()
    {
        $db = Database::getConnection();
        $owner = Session::getUser()->getUsername();
        $sql = "SELECT * FROM `users` WHERE `owner`='$owner'";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }

    public static function getProfileowner()
    {
        $db = Database::getConnection();
        $owner = Session::getUser()->getUsername();
        $sql = "SELECT * FROM `auth` WHERE `username`='$owner'";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }

    public static function getPostcount()
    {
        $username = $_GET['username'];
        $db = Database::getConnection();
        $sql = "SELECT COUNT(*) AS `image_uri` FROM `posts` WHERE `owner` = '$username'";
        $result = $db->query($sql);
        return iterator_to_array($result);
    }

    // Start: This code user for search profiles code
    public static function getAllUser()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM `users`";
        $result = $db->query($sql);
        return iterator_to_array($result);
    }
    public static function getAuthInfo($p)
    {
        $db = Database::getConnection();
        $sql = "SELECT `phone`,`email` FROM `auth` WHERE `id` = '$p'";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }
    public static function getTotalLikecount($p)
    {
        $db = Database::getConnection();
        $sql = "SELECT SUM(`like_count`) AS `like_count` FROM `posts` WHERE `owner` = '$p'";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }
    public static function getTotalPostcount($p)
    {
        $db = Database::getConnection();
        $sql = "SELECT COUNT(*) AS 'image_uri' FROM `posts` WHERE `owner` = '$p'";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }
    // Ended

    public static function getDeviceInfo()
    {
        $db = Database::getConnection();
        $id = Session::getUser()->getID();
        $sql = "SELECT `login_time`,`ip`,`user_agent`,`active` FROM `session` WHERE `uid`='$id'";
        $result = $db->query($sql);
        return $result->fetch_assoc();
    }

    public function __construct($id)
    {
        $this->id = $id;
        $this->conn = Database::getConnection();
        $this->table = 'users';
    }
}