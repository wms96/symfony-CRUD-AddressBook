<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="address_book")
 *
 * @UniqueEntity("email_address",message="The email is not unique")
 * @UniqueEntity("phone_number",message="The phone number is not unique")
 *
 */
class AddressBook {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotBlank()
     * @Assert\NotNull(
     * message = "Choose a valid genre."

     * )
     * @ORM\Column(type="string", length=100)

     */
    protected $first_name;

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Your last name must be at least {{ limit }} characters long",
     *      maxMessage = "Your last name cannot be longer than {{ limit }} characters"
     * )
     *  @Assert\NotBlank()
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=100)

     */
    protected $last_name;

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Your first street address must be at least {{ limit }} characters long",
     *      maxMessage = "Your first street address cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)

     */
    protected $street_address;

    /**
     * @Assert\Length(
     *      max = 255,
     *      maxMessage = "Your zip code name cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(type="string", length=255, nullable=true)

     */
    protected $zip_code;

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Your city must be at least {{ limit }} characters long",
     *      maxMessage = "Your city name cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)

     */
    protected $city;

    /**
     * @Assert\NotBlank
     * @Assert\NotNull
     * @ORM\Column(type="string", length=3)
     */
    protected $country;

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your phone number must be at least {{ limit }} characters long",
     *      maxMessage = "Your phone number name cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=50)
     */
    protected $phone_number;

    /**
     * @Assert\Date
     * @Assert\NotBlank
     * @Assert\NotNull
     * @ORM\Column(type="date")
     */
    protected $birthday;

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your city must be at least {{ limit }} characters long",
     *      maxMessage = "Your city name cannot be longer than {{ limit }} characters"
     * )
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=50)

     */
    protected $email_address;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $picture;



    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name)
    {
        // we add filter here to sanitize the input
        $this->first_name =  filter_var($first_name, FILTER_SANITIZE_STRING);

        return $this;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name)
    {
        $this->last_name =  filter_var($last_name, FILTER_SANITIZE_STRING);

        return $this;
    }

    public function getStreetAddress()
    {
        return $this->street_address;
    }

    public function setStreetAddress(string $street_address)
    {
        $this->street_address =  filter_var($street_address, FILTER_SANITIZE_STRING);

        return $this;
    }

    public function getZipCode()
    {
        return $this->zip_code;
    }

    public function setZipCode($zip_code = '')
    {
        $this->zip_code =  filter_var($zip_code, FILTER_SANITIZE_STRING);

        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity(string $city)
    {
        $this->city =  filter_var($city, FILTER_SANITIZE_STRING);

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry(string $country)
    {
        $this->country =  filter_var($country, FILTER_SANITIZE_STRING);

        return $this;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number)
    {
        $this->phone_number =  filter_var($phone_number, FILTER_SANITIZE_STRING);

        return $this;
    }

    public function getBirthday()
    {
        $date = $this->birthday;
        if(isset($date) )
            return $date->format('Y-m-d');
        return $date;
    }

    public function setBirthday(string $birthday)
    {
        $this->birthday = new \DateTime( $birthday );
        return $this;
    }

    public function getEmailAddress()
    {
        return $this->email_address;
    }

    public function setEmailAddress(string $email_address)
    {
        $this->email_address =  filter_var($email_address, FILTER_SANITIZE_STRING);

        return $this;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture = '')
    {
        $this->picture =  filter_var($picture, FILTER_SANITIZE_STRING);

        return $this;
    }
}