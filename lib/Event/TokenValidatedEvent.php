<?php
/*
 * @copyright Copyright (c) 2022 Julien Veyssier <eneiluj@posteo.net>
 *
 * @author Julien Veyssier <eneiluj@posteo.net>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */

declare(strict_types=1);

namespace OCA\UserOIDC\Event;

use OCA\UserOIDC\Db\Provider;
use OCP\EventDispatcher\Event;

/**
 * This event is emitted with the bearer token that has just been validated during an API call
 *
 * It may be used for further handling of oidc authenticated requests
 */
class TokenValidatedEvent extends Event {

	public function __construct(
		private array $token,
		private Provider $provider,
		private array $discovery,
	) {
		parent::__construct();
	}

	public function getToken(): array {
		return $this->token;
	}

	public function getProvider(): Provider {
		return $this->provider;
	}

	public function getDiscovery(): array {
		return $this->discovery;
	}
}
