<?php
// (c) Copyright 2002-2017 by authors of the Tiki Wiki/CMS/Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: HTTPGetCommandTask.php 62232 2017-04-16 16:48:48Z rjsmelo $

class Scheduler_Task_HTTPGetCommandTask extends Scheduler_Task_CommandTask
{

	public function execute($params = null)
	{
		try {
			if (!array_key_exists('url', $params)) {
				$this->errorMessage = tra('Missing the URL to call.');

				return false;
			}

			if (!array_key_exists('output_file', $params)) {
				$this->errorMessage = tra('Missing the file path to where the output should be saved.');

				return false;
			}

			$url = $params['url'];
			$output = $params['output_file'];

			$tikilib = TikiLib::lib('tiki');
			$client = $tikilib->get_http_client($url);

			if (!empty($params['basic_auth_username']) && !empty($params['basic_auth_password'])) {
				$client->setAuth($params['basic_auth_username'], $params['basic_auth_password']);
			}

			$additionalHeaders = trim($params['additional_http_headers']);

			if (!empty($additionalHeaders)) {
				$additionalHeaders = explode("\n", $additionalHeaders);
				$additionalHeaders = array_map(function($value){ return trim($value); }, $additionalHeaders);
				$client->setHeaders($additionalHeaders);
			}

			$response = $client->send();

			if ($response->isSuccess()) {
				$fp = fopen($output, "w");
				if (!$fp) {
					$this->errorMessage = sprintf(tra('Failed to open file %s to write.'), $output);

					return false;
				}

				fwrite($fp, $response->getContent());
				fclose($fp);

				return true;
			} else {
				$this->errorMessage = $response->getReasonPhrase();

				return false;
			}
		} catch (\Exception $e){
			$this->errorMessage = $e->getMessage();
			return false;
		}
	}

	public function getParams()
	{
		return array(
			'url' => array(
				'name' => tra('URL'),
				'type' => 'text',
				'required' => true,
			),
			'output_file' => array(
				'name' => tra('Output File'),
				'description' => tra('File path to save the output'),
				'type' => 'text',
				'required' => true,
			),
			'additional_http_headers' => array(
				'name' => tra('Additional HTTP Headers'),
				'description' => tra('One HTTP Header per line'),
				'type' => 'textarea',
			),
			'basic_auth_username' => array(
				'name' => tra('Auth Username'),
				'type' => 'text',
			),
			'basic_auth_password' => array(
				'name' => tra('Auth Password'),
				'type' => 'password',
			),
		);
	}

}
