<?php

		// Encrypt Data
		function encrypt($message, $encryption_key)
		{
			$key = hex2bin($encryption_key);
			$nonceSize = openssl_cipher_iv_length('aes-256-ctr');
			$nonce = openssl_random_pseudo_bytes($nonceSize);

			// Cipher Data
			$cipherData = openssl_encrypt(
				$message,
				'aes-256-ctr',
				$key,
				OPENSSL_RAW_DATA,
				$nonce
			);

			// Function return value
			return base64_encode($nonce.$cipherData);
		}
		
		// Decrypt data
		function decrypt ($message, $encryption_key)
		{
			$key = hex2bin($encryption_key);
			$message = base64_decode($message);
			$nonceSize = openssl_cipher_iv_length('aes-256-ctr');
			$nonce = mb_substr($message, 0, $nonceSize , '8bit');
			$cipherText = mb_substr($message, $nonceSize, null, '8bit');

			$plainData = openssl_decrypt(
				$cipherText,
				'aes-256-ctr',
				$key,
				OPENSSL_RAW_DATA,
				$nonce
			);

			return $plainData;
		}
?>