<?php
class UserTest  extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function mock_example()
    {
        $address = $this->getMock('Address');
        $user = new User();

        $user->setAddress($address);

        $this->assertNotNull($user->getAddress());
    }
} 