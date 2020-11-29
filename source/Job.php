<?php 


namespace Job_Portal;
use Job_Portal\Database;

class Job extends Database
{
     private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function fuckers()
    {
        echo "Hello from fuckers class :)";
    }

    public function getUsersProfile($email)
    {
        $this->db->query("SELECT * FROM register WHERE email = :email");
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        return $row;
    }

    public function totalUserJobs()
    {
        $this->db->query("SELECT id FROM jobs WHERE who = 'nika@gmail.com'");
        $results = $this->db->resultSet();
        return count($results);
    }

    public function totalRegister()
    {
        $this->db->query("SELECT id FROM register ORDER BY id");
        $results = $this->db->resultSet();
        return count($results);
    }

    public function totalJobs()
    {
        $this->db->query("SELECT id FROM jobs ORDER BY id");
        $results = $this->db->resultSet();
        return count($results);
    }

    // Get All Jobs
    public function getAllJobs()
    {
        $this->db->query("SELECT * FROM jobs");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getCompany()
    {
        $this->db->query("SELECT * FROM company");
        $results = $this->db->resultSet();
        return $results;
    }

    // Get Categories
    public function getCategories()
    {
        $this->db->query("SELECT * FROM categories");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getCities()
    {
        $this->db->query("SELECT * FROM city");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getByCategory($category)
    {
        $this->db->query("SELECT jobs.*, categories.name AS cname 
                        FROM jobs 
                        INNER JOIN categories
                        ON jobs.category = categories.name 
                        WHERE jobs.category = $category
                        ORDER BY post_date DESC 
                        ");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getByCities($city)
    {
        $this->db->query("SELECT jobs.*, city.city AS ccity 
                        FROM jobs 
                        INNER JOIN city
                        ON jobs.category_id = city.id 
                        WHERE jobs.category_id = $city
                        ");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getTimes()
    {
        $this->db->query("SELECT * FROM times");
        $results = $this->db->resultSet();
        return $results;
    }

    // Get category
    public function getCategory($category_id)
    {
        $this->db->query("SELECT * FROM categories WHERE id = :category_id");
        $this->db->bind(':category_id', $category_id);
        $row = $this->db->single();
        return $row;
    }

    // Get Job
    public function getJob($id)
    {
        $this->db->query("SELECT * FROM jobs WHERE id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getCompanyDetails($id)
    {
        $this->db->query("SELECT * FROM company WHERE id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }









    public function getLogin($data)
    {
        $this->db->query("SELECT * FROM register WHERE email = :email AND password = :password");
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $_SESSION['username'] = $data['email'];
        setcookie("type", $_SESSION['username'], time()+3600);
        $row = $this->db->resultSet();
        return $row;
    }

    public function Logout()
    {
        setcookie("type", $_SESSION['username'], time()-3600);
        header("location:job_login.php");
    }







    // Create Registration
    public function create_register($data)
    {
        //Insert Query
        $this->db->query("INSERT INTO register (name, email, username, password)
                VALUES (:name,:email, :username, :password)");
        // Bind Data
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_BCRYPT));

        if($data['password'] === $data['confirm_password'])
        {
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }

    // Create Job
    public function create($data)
    {
        //Insert Query
        $this->db->query("INSERT INTO jobs (category, job_title, company, company_id, description, location, salary, phone, time, contact_user, contact_email, who)
            VALUES (:category,:job_title, :company, :company_id,:description, :location, :salary, :phone, :time, :contact_user, :contact_email, :who)");
        // Bind Data
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':company_id', $data['company_id']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':time', $data['time']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);
        $this->db->bind(':who', $data['who']);
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    // Create Company
    public function create_company($data)
    {
        $this->db->query("INSERT INTO company 
                    (
                    company_name,company_tagline,company_ceo,company_description,company_email,company_phone,company_website,
                    company_location,company_establish,company_facebook,company_google,company_twitter,company_instagram, 
                    company_linkedin,company_dribbble,company_about
                    )
                    
            VALUES (
                    :company_name,:company_tagline,:company_ceo,:company_description,:company_email,:company_phone,:company_website,
                    :company_location,:company_establish,:company_facebook,:company_google,:company_twitter,:company_instagram, 
                    :company_linkedin,:company_dribbble,:company_about)"
        );
        $this->db->bind(':company_name', $data['company']);
        $this->db->bind(':company_tagline', $data['tagline']);
        $this->db->bind(':company_ceo', $data['ceo']);
        $this->db->bind(':company_description', $data['description']);
        $this->db->bind(':company_email', $data['email']);
        $this->db->bind(':company_phone', $data['phone']);
        $this->db->bind(':company_website', $data['website']);
        $this->db->bind(':company_location', $data['location']);
        $this->db->bind(':company_establish', $data['establish']);
        $this->db->bind(':company_facebook', $data['facebook']);
        $this->db->bind(':company_google', $data['google']);
        $this->db->bind(':company_twitter', $data['twitter']);
        $this->db->bind(':company_instagram', $data['instagram']);
        $this->db->bind(':company_linkedin', $data['linkedin']);
        $this->db->bind(':company_dribbble', $data['dribbble']);
        $this->db->bind(':company_about', $data['about']);



        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


    public function update($id, $data)
    {
        $this->db->query("UPDATE jobs
                SET 
                category_id = :category_id,
                job_title = :job_title,
                company = :company,
                description = :description,
                location = :location,
                salary = :salary,
                contact_user = :contact_user,
                contact_email = :contact_email 
                WHERE id = $id");
        // Bind Data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


    public function delete($id)
    {
        $this->db->query("DELETE FROM jobs WHERE id = $id");
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}