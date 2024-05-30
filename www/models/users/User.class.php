<?php

class User
{
    public int $id;
    public string $identifiant;
    private string $password;
    public bool $isValide;

    public function __construct(int $id, string $identifiant, string $password)
    {
        $this->id = $id;
        $this->identifiant = $identifiant;
        $this->password = $password;
        $this->isValide = false;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of identifiant
     *
     * @return string
     */
    public function getIdentifiant(): string
    {
        return $this->identifiant;
    }

    /**
     * Set the value of identifiant
     *
     * @param string $identifiant
     *
     * @return self
     */
    public function setIdentifiant(string $identifiant): self
    {
        $this->identifiant = $identifiant;
        return $this;
    }

    /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get the value of isValide
     *
     * @return bool
     */
    public function getIsValide(): bool
    {
        return $this->isValide;
    }

    /**
     * Set the value of isValide
     *
     * @param bool $isValide
     *
     * @return self
     */
    public function setIsValide(bool $isValide): self
    {
        $this->isValide = $isValide;
        return $this;
    }
}
