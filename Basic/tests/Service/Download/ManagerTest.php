<?php
namespace Test\Service\Download;

use Download\Adapter\Ftp;
use Download\Manager;
use PHPUnit_Framework_TestCase;

class ManagerTest extends PHPUnit_Framework_TestCase
{
    protected $user;

    public function setUp()
    {
        $this->user = $this->getMock('User');
    }

    public function test_download_manager_using_spy()
    {
        $ftpSpy = new FtpSpy();

        $downloadManager = new Manager();
        $downloadManager->setAdapter($ftpSpy);

        $downloadManager->download('dummy file', $this->user);

        $this->assertTrue($ftpSpy->wasDownloadCalled());
    }

    public function test_download_manager_using_stub()
    {
        $file = 'dummy_file.txt';

        $ftpStub = $this->getMock('Download\Adapter\Ftp');
        $ftpStub
            ->method('download')
            ->will($this->returnValue($file));

        $downloadManager = new Manager();
        $downloadManager->setAdapter($ftpStub);

        $this->assertEquals($file, $downloadManager->download($file, $this->user));
    }

    public function test_download_manager_using_mock()
    {
        $file = 'dummy_file.txt';

        $ftpStub = $this->getMock('Download\Adapter\Ftp');
        $ftpStub
            ->expects($this->once())
            ->method('download')
            ->with($file, $this->user)
            ->will($this->returnValue($file));

        $downloadManager = new Manager();
        $downloadManager->setAdapter($ftpStub);

        $this->assertEquals($file, $downloadManager->download($file, $this->user));
    }

    /**
     * Ideally this method should be never used
     */
    public function test_download_manager_using_test_double()
    {
        $file = 'dummy_file.txt';
        $ftpDouble = new FtpDouble();

        $downloadManager = new Manager();
        $downloadManager->setAdapter($ftpDouble);

        $this->assertEquals($file, $downloadManager->download($file, $this->user));
    }

    public function test_download_manager_invokes_log()
    {
        $file = 'dummy_file.txt';

        $ftpStub = $this->getMock('Download\Adapter\Ftp');

        $logMock = $this->getMock('Log\LoggerProxy');
        $logMock
            ->expects($this->once())
            ->method('log')
            ->with("File was requested: $file");

        $downloadManager = new Manager();
        $downloadManager->setAdapter($ftpStub);
        $downloadManager->setLogger($logMock);


        $downloadManager->download($file, $this->user);
    }
}

/**
 * Proxy class
 * Class FtpSpy
 * @package Test\Service\Download
 */
class FtpSpy extends Ftp
{
    protected $flag = false;

    public function download($file, \User $user)
    {
        $result = parent::download($file, $user);
        $this->flag = true;

        return $result;
    }

    public function wasDownloadCalled()
    {
        return $this->flag;
    }
}

class FtpDouble extends Ftp
{
    public function download($file, \User $user)
    {
        return $file;
    }
}