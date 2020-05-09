<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="bigint")
     */
    private $phone_no;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dob;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        // $roles[] = 'ROLE_USER';

        return array_unique($roles);

        // var_dump($this->roles);
        // if ($this->roles == 'ROLE_TEACHER') {
        //     return [
        //         'ROLE_TEACHER'
        //     ];
        // }
        // if ($this->roles == 'ROLE_STUDENT') {
        //     return [
        //         'ROLE_STUDENT'
        //     ];
        // }
        // $roles = $this->roles;
        // if ($this->roles == 'ROLE_TEACHER') {
        //     $roles[] = 'ROLE_TEACHER';
        // }
        // if ($this->roles == 'ROLE_STUDENT') {
        //     $roles[] = 'ROLE_STUDENT';
        // }
        // $roles[] = $this->roles;
        // return $roles;
        // return array_unique($roles);

        // return array($this->roles);
    }

    // public function setRoles(array $roles): self
    // {
    //     $this->roles = $roles;

    //     return $this;
    // }
    public function setRoles($roles)
    {
        $this->roles = $roles;

        // return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNo(): ?string
    {
        return $this->phone_no;
    }

    public function setPhoneNo(string $phone_no): self
    {
        $this->phone_no = $phone_no;

        return $this;
    }

    public function getDob(): ?string
    {
        return $this->dob;
    }

    public function setDob(string $dob): self
    {
        $this->dob = $dob;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }
}
