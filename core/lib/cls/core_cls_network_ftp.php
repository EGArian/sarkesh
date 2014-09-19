<?php
// this class is for FTP file transfer
namespace core\cls\network;

/**
 * FTP class
 */
class ftp {
	/**
	 * Host name
	 */
	private $host;
	/**
	 * FTP connection port
	 */
	private $port = 21;
	/**
	 * Connection FTP time out
	 */
	private $timeOut = 100;
	/**
	 * FTP connection
	 */
	private $connection;
	/**
	 * FTP login user
	 */
	private $user;
	/**
	 * FTP login password
	 */
	private $pwd;
	/**
	 * Passive mode true for on and false for off
	 */
	private $passive = false;
	/**
	 * SSL FTP at default is off
	 */
	private $ssl = false;
	/**
	 * Error message when try to use methods
	 */
	private $errorMsg;
	/**
	 * Set params
	 */
	public function __construct($host = null, $port = 21, $timeOut = 100, $user = null, $pwd = null) {
		$this->host = $host;
		$this->port = $port;
		$this->timeOut = $timeOut;
		$this->user = $user;
		$this->pwd = $pwd;
		$this->ssl = $this->checkSSL ();
	}
	/**
	 * Check SSL connection is on or off
	 */
	public function checkSSL() {
		if (function_exists ( "ftp_ssl_connect" )) {
			return true;
		}
		return false;
	}
	/**
	 * Connect to FTP server
	 */
	public function connect() {
		if ($this->ssl) {
			$this->connection = ftp_ssl_connect ( $this->host, $this->port, $this->timeOut );
			if (! $this->connection) {
				$this->errorMsg = "could not connect to $this->host";
				return false;
			}
			return true;
		} elseif (! $this->ssl) {
			$this->connection = ftp_connect ( $this->host, $this->port, $this->timeOut );
			if (! $this->connection) {
				$this->errorMsg = "could not connect to $this->host";
			}
			return true;
		}
	}
	/**
	 * Try to login your FTP server
	 */
	public function login() {
		if ($this->connect ()) {
			if (ftp_login ( $this->connection, $this->user, $this->pwd )) {
				ftp_pasv ( $this->connection, $this->passive );
				return true;
			}
		}
		$this->errorMsg = "login failed to $this->host";
		return false;
	}
	/**
	 * Change your directory you work on it
	 */
	public function changeDir($dir) {
		if (ftp_chdir ( $this->connection, $dir )) {
			return true;
		}
		$this->errorMsg = "failed to change $dir";
		return false;
	}
	/**
	 * Set params for folders and files .
	 *
	 *
	 * User numbers like perm=0777 for max permission .Dont use expression like -rw-rw-rw- .
	 */
	public function setPerm($perm = 0, $dir = null) {
		if (isset ( $dir )) {
			if (ftp_chmod ( $this->connection, $perm, $dir )) {
				return true;
			}
		}
		$this->errorMsg = "failed to set permission for $dir";
		return false;
	}
	/**
	 * Returns your current directory you work with it
	 */
	public function currentDir() {
		return ftp_pwd ( $this->connection );
	}
	/**
	 * Close FTP connection
	 */
	public function closeConnection() {
		if ($this->connection) {
			ftp_close ( $this->connection );
			$this->connection = false;
		}
	}
	/**
	 * Delete file
	 */
	public function delete($file = null) {
		if (isset ( $file )) {
			if (ftp_delete ( $this->connection, $file )) {
				return true;
			}
		}
		$this->errorMsg = "failed to delete $file";
		return false;
	}
	/**
	 * Create directory
	 */
	public function createDir($dir) {
		if (isset ( $dir )) {
			if (ftp_mkdir ( $this->connection, $dir )) {
				return true;
			}
		}
		$this->errorMsg = "failed to creat $dir";
		return false;
	}
	/**
	 * Upload file
	 */
	public function upload($l_file = null, $r_file = null, $mode = null) {
		if (ftp_put ( $this->connection, $r_file, $l_file, $mode )) {
			return true;
		}
		$this->errorMsg = "failed to upload file $l_file";
		return false;
	}
	/**
	 * Remove a directory
	 */
	public function removeDir($dir) {
		if (isset ( $dir )) {
			if (ftp_rmdir ( $this->connection, $dir )) {
				return true;
			}
		}
		$this->errorMsg = "failed to remove directory $dir";
		return false;
	}
}
?>
