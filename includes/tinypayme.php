<?php
require_once("mashape/MashapeClient.php");

class Tinypayme
{
	private $publicKey;
	private $privateKey;
	function __construct($publicKey, $privateKey)
	{
		$this->publicKey = $publicKey;
		$this->privateKey = $privateKey;
	}

	public function checkOAuthAccessToken($access_token)
	{
		$parameters = array("access_token" => $access_token);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/oauth/access_token/{access_token}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function contactUser($access_token, $user_id, $name, $email, $message, $subject = null)
	{
		$parameters = array("access_token" => $access_token,
		                    "user_id" => $user_id,
		                    "name" => $name,
		                    "email" => $email,
		                    "message" => $message,
		                    "subject" => $subject);
		$response = HttpClient::doRequest(HttpMethod::POST, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/user/{user_id}/contact?access_token={access_token}&name={name}&email={email}&message={message}&subject={subject}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function createItem($access_token, $title, $currency, $price, $description, $tags = null, $quantity = null, $require_shipment_address = null, $shipment_countries = null, $shipment_costs = null, $shipment_costs_per_item = null, $geo_latitude = null, $geo_longitude = null, $image_tokens = null, $file_token = null, $widget_url = null, $charity_id = null, $charity_percentage = null, $language = null, $country = null, $marketplace_category_id = null)
	{
		$parameters = array("access_token" => $access_token,
		                    "title" => $title,
		                    "currency" => $currency,
		                    "price" => $price,
		                    "description" => $description,
		                    "tags" => $tags,
		                    "quantity" => $quantity,
		                    "require_shipment_address" => $require_shipment_address,
		                    "shipment_countries" => $shipment_countries,
		                    "shipment_costs" => $shipment_costs,
		                    "shipment_costs_per_item" => $shipment_costs_per_item,
		                    "geo_latitude" => $geo_latitude,
		                    "geo_longitude" => $geo_longitude,
		                    "image_tokens" => $image_tokens,
		                    "file_token" => $file_token,
		                    "widget_url" => $widget_url,
		                    "charity_id" => $charity_id,
		                    "charity_percentage" => $charity_percentage,
		                    "language" => $language,
		                    "country" => $country,
		                    "marketplace_category_id" => $marketplace_category_id);
		$response = HttpClient::doRequest(HttpMethod::POST, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/item?access_token={access_token}&title={title}&currency={currency}&price={price}&description={description}&tags={tags}&quantity={quantity}&require_shipment_address={require_shipment_address}&shipment_countries={shipment_countries}&shipment_costs={shipment_costs}&shipment_costs_per_item={shipment_costs_per_item}&geo_latitude={geo_latitude}&geo_longitude={geo_longitude}&image_tokens={image_tokens}&file_token={file_token}&widget_url={widget_url}&charity_id={charity_id}&charity_percentage={charity_percentage}&language={language}&country={country}&marketplace_category_id={marketplace_category_id}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function createOrder($item_id, $name, $email, $address_line_1 = null, $address_line_2 = null, $postal_zip_code = null, $state_province = null, $city = null, $country = null, $comment = null, $quantity = null, $cancel_url = null, $return_url = null, $marketplace_id = null, $access_token = null, $custom_price = null)
	{
		$parameters = array("item_id" => $item_id,
		                    "name" => $name,
		                    "email" => $email,
		                    "address_line_1" => $address_line_1,
		                    "address_line_2" => $address_line_2,
		                    "postal_zip_code" => $postal_zip_code,
		                    "state_province" => $state_province,
		                    "city" => $city,
		                    "country" => $country,
		                    "comment" => $comment,
		                    "quantity" => $quantity,
		                    "cancel_url" => $cancel_url,
		                    "return_url" => $return_url,
		                    "marketplace_id" => $marketplace_id,
		                    "access_token" => $access_token,
		                    "custom_price" => $custom_price);
		$response = HttpClient::doRequest(HttpMethod::POST, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/item/{item_id}/order?name={name}&email={email}&address_line_1={address_line_1}&address_line_2={address_line_2}&postal_zip_code={postal_zip_code}&state_province={state_province}&city={city}&country={country}&comment={comment}&quantity={quantity}&cancel_url={cancel_url}&return_url={return_url}&marketplace_id={marketplace_id}&access_token={access_token}&custom_price={custom_price}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function createSSOToken($access_token)
	{
		$parameters = array("access_token" => $access_token);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/sso?access_token={access_token}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function deleteItem($access_token, $item_id)
	{
		$parameters = array("access_token" => $access_token,
		                    "item_id" => $item_id);
		$response = HttpClient::doRequest(HttpMethod::POST, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/item/{item_id}/delete?access_token={access_token}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function deleteOAuthAccessToken($access_token, $marketplace_id)
	{
		$parameters = array("access_token" => $access_token,
		                    "marketplace_id" => $marketplace_id);
		$response = HttpClient::doRequest(HttpMethod::POST, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/oauth/access_token/{access_token}/delete?marketplace_id={marketplace_id}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getCharities()
	{
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/charities", null, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getCountries($language = null)
	{
		$parameters = array("language" => $language);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/countries?language={language}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getCountriesByRegion($region)
	{
		$parameters = array("region" => $region);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/countries/{region}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getCurrencies()
	{
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/currencies", null, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getDownload($access_token, $order_id)
	{
		$parameters = array("access_token" => $access_token,
		                    "order_id" => $order_id);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/order/{order_id}/download?access_token={access_token}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getGeoRadius($mylat = null, $mylon = null, $range = null, $unit = null)
	{
		$parameters = array("mylat" => $mylat,
		                    "mylon" => $mylon,
		                    "range" => $range,
		                    "unit" => $unit);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/georadius?mylat={mylat}&mylon={mylon}&range={range}&unit={unit}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getItem($item_id, $select = null, $not_select = null)
	{
		$parameters = array("item_id" => $item_id,
		                    "select" => $select,
		                    "not_select" => $not_select);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/item/{item_id}?select={select}&not_select={not_select}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getLanguages()
	{
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/languages", null, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getMarketplace($marketplace_id, $select = null, $not_select = null)
	{
		$parameters = array("marketplace_id" => $marketplace_id,
		                    "select" => $select,
		                    "not_select" => $not_select);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/marketplace/{marketplace_id}?select={select}&not_select={not_select}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getMarketplaceCategorySearch($marketplace_id, $category_id, $q = null, $items = null, $start = null, $file = null, $charity = null, $image = null, $video = null, $shipment = null, $min_price = null, $max_price = null, $country = null, $currency = null, $lang = null, $tag = null, $tags = null, $sort_by = null, $select = null, $not_select = null)
	{
		$parameters = array("marketplace_id" => $marketplace_id,
		                    "category_id" => $category_id,
		                    "q" => $q,
		                    "items" => $items,
		                    "start" => $start,
		                    "file" => $file,
		                    "charity" => $charity,
		                    "image" => $image,
		                    "video" => $video,
		                    "shipment" => $shipment,
		                    "min_price" => $min_price,
		                    "max_price" => $max_price,
		                    "country" => $country,
		                    "currency" => $currency,
		                    "lang" => $lang,
		                    "tag" => $tag,
		                    "tags" => $tags,
		                    "sort_by" => $sort_by,
		                    "select" => $select,
		                    "not_select" => $not_select);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/marketplace/{marketplace_id}/category/{category_id}/search?q={q}&items={items}&start={start}&file={file}&charity={charity}&image={image}&video={video}&shipment={shipment}&min_price={min_price}&max_price={max_price}&country={country}&currency={currency}&lang={lang}&tag={tag}&tags={tags}&sort_by={sort_by}&select={select}&not_select={not_select}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getMarketplaceSearch($marketplace_id, $q = null, $items = null, $start = null, $file = null, $charity = null, $image = null, $video = null, $shipment = null, $min_price = null, $max_price = null, $country = null, $currency = null, $lang = null, $tag = null, $tags = null, $sort_by = null, $select = null, $not_select = null)
	{
		$parameters = array("marketplace_id" => $marketplace_id,
		                    "q" => $q,
		                    "items" => $items,
		                    "start" => $start,
		                    "file" => $file,
		                    "charity" => $charity,
		                    "image" => $image,
		                    "video" => $video,
		                    "shipment" => $shipment,
		                    "min_price" => $min_price,
		                    "max_price" => $max_price,
		                    "country" => $country,
		                    "currency" => $currency,
		                    "lang" => $lang,
		                    "tag" => $tag,
		                    "tags" => $tags,
		                    "sort_by" => $sort_by,
		                    "select" => $select,
		                    "not_select" => $not_select);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/marketplace/{marketplace_id}/search?q={q}&items={items}&start={start}&file={file}&charity={charity}&image={image}&video={video}&shipment={shipment}&min_price={min_price}&max_price={max_price}&country={country}&currency={currency}&lang={lang}&tag={tag}&tags={tags}&sort_by={sort_by}&select={select}&not_select={not_select}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getMarketplaceUsers($marketplace_id, $page = null, $select = null, $not_select = null)
	{
		$parameters = array("marketplace_id" => $marketplace_id,
		                    "page" => $page,
		                    "select" => $select,
		                    "not_select" => $not_select);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/marketplace/{marketplace_id}/users?page={page}&select={select}&not_select={not_select}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getMyItems($access_token, $select = null, $not_select = null, $page = null, $limit = null, $marketplace_id = null)
	{
		$parameters = array("access_token" => $access_token,
		                    "select" => $select,
		                    "not_select" => $not_select,
		                    "page" => $page,
		                    "limit" => $limit,
		                    "marketplace_id" => $marketplace_id);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/me/items?access_token={access_token}&select={select}&not_select={not_select}&page={page}&limit={limit}&marketplace_id={marketplace_id}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getMyMarketplaces($access_token, $select = null, $not_select = null)
	{
		$parameters = array("access_token" => $access_token,
		                    "select" => $select,
		                    "not_select" => $not_select);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/me/marketplaces?access_token={access_token}&select={select}&not_select={not_select}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getMyOrders($access_token, $select = null, $not_select = null)
	{
		$parameters = array("access_token" => $access_token,
		                    "select" => $select,
		                    "not_select" => $not_select);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/me/orders?access_token={access_token}&select={select}&not_select={not_select}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getMyProfile($access_token, $select = null, $not_select = null)
	{
		$parameters = array("access_token" => $access_token,
		                    "select" => $select,
		                    "not_select" => $not_select);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/me?access_token={access_token}&select={select}&not_select={not_select}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getOAuthAccessToken($access_token, $code)
	{
		$parameters = array("access_token" => $access_token,
		                    "code" => $code);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/oauth/access_token?access_token={access_token}&code={code}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getOAuthPermission($marketplace_id, $redirect_uri, $scope = null, $state = null)
	{
		$parameters = array("marketplace_id" => $marketplace_id,
		                    "redirect_uri" => $redirect_uri,
		                    "scope" => $scope,
		                    "state" => $state);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/oauth/permission?marketplace_id={marketplace_id}&redirect_uri={redirect_uri}&scope={scope}&state={state}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getOrderStatus($order_id)
	{
		$parameters = array("order_id" => $order_id);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/order/{order_id}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getRegions()
	{
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/regions", null, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getSearch($q = null, $items = null, $start = null, $file = null, $charity = null, $image = null, $video = null, $shipment = null, $min_price = null, $max_price = null, $country = null, $currency = null, $lang = null, $tag = null, $tags = null, $sort_by = null, $select = null, $not_select = null, $mylon = null, $mylat = null, $range = null, $unit = null)
	{
		$parameters = array("q" => $q,
		                    "items" => $items,
		                    "start" => $start,
		                    "file" => $file,
		                    "charity" => $charity,
		                    "image" => $image,
		                    "video" => $video,
		                    "shipment" => $shipment,
		                    "min_price" => $min_price,
		                    "max_price" => $max_price,
		                    "country" => $country,
		                    "currency" => $currency,
		                    "lang" => $lang,
		                    "tag" => $tag,
		                    "tags" => $tags,
		                    "sort_by" => $sort_by,
		                    "select" => $select,
		                    "not_select" => $not_select,
		                    "mylon" => $mylon,
		                    "mylat" => $mylat,
		                    "range" => $range,
		                    "unit" => $unit);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/search?q={q}&items={items}&start={start}&file={file}&charity={charity}&image={image}&video={video}&shipment={shipment}&min_price={min_price}&max_price={max_price}&country={country}&currency={currency}&lang={lang}&tag={tag}&tags={tags}&sort_by={sort_by}&select={select}&not_select={not_select}&mylon={mylon}&mylat={mylat}&range={range}&unit={unit}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getSearchSuggestions($q = null)
	{
		$parameters = array("q" => $q);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/search/suggestions?q={q}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getShipmentCountries($item_id, $language = null)
	{
		$parameters = array("item_id" => $item_id,
		                    "language" => $language);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/item/{item_id}/shipment?language={language}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getUserItems($user_id, $select = null, $not_select = null, $page = null, $limit = null, $marketplace_id = null)
	{
		$parameters = array("user_id" => $user_id,
		                    "select" => $select,
		                    "not_select" => $not_select,
		                    "page" => $page,
		                    "limit" => $limit,
		                    "marketplace_id" => $marketplace_id);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/user/{user_id}/items?select={select}&not_select={not_select}&page={page}&limit={limit}&marketplace_id={marketplace_id}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getUserProfile($user_id, $select = null, $not_select = null)
	{
		$parameters = array("user_id" => $user_id,
		                    "select" => $select,
		                    "not_select" => $not_select);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/user/{user_id}?select={select}&not_select={not_select}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function getWidget($item_id, $maxwidth = null)
	{
		$parameters = array("item_id" => $item_id,
		                    "maxwidth" => $maxwidth);
		$response = HttpClient::doRequest(HttpMethod::GET, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/item/{item_id}/widget?maxwidth={maxwidth}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function updateItem($access_token, $item_id, $title = null, $currency = null, $price = null, $description = null, $tags = null, $quantity = null, $require_shipment_address = null, $shipment_countries = null, $shipment_costs = null, $shipment_costs_per_item = null, $geo_latitude = null, $geo_longitude = null, $image_tokens = null, $file_token = null, $widget_url = null, $charity_id = null, $charity_percentage = null, $language = null, $country = null)
	{
		$parameters = array("access_token" => $access_token,
		                    "item_id" => $item_id,
		                    "title" => $title,
		                    "currency" => $currency,
		                    "price" => $price,
		                    "description" => $description,
		                    "tags" => $tags,
		                    "quantity" => $quantity,
		                    "require_shipment_address" => $require_shipment_address,
		                    "shipment_countries" => $shipment_countries,
		                    "shipment_costs" => $shipment_costs,
		                    "shipment_costs_per_item" => $shipment_costs_per_item,
		                    "geo_latitude" => $geo_latitude,
		                    "geo_longitude" => $geo_longitude,
		                    "image_tokens" => $image_tokens,
		                    "file_token" => $file_token,
		                    "widget_url" => $widget_url,
		                    "charity_id" => $charity_id,
		                    "charity_percentage" => $charity_percentage,
		                    "language" => $language,
		                    "country" => $country);
		$response = HttpClient::doRequest(HttpMethod::POST, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/item/{item_id}/update?access_token={access_token}&title={title}&currency={currency}&price={price}&description={description}&tags={tags}&quantity={quantity}&require_shipment_address={require_shipment_address}&shipment_countries={shipment_countries}&shipment_costs={shipment_costs}&shipment_costs_per_item={shipment_costs_per_item}&geo_latitude={geo_latitude}&geo_longitude={geo_longitude}&image_tokens={image_tokens}&file_token={file_token}&widget_url={widget_url}&charity_id={charity_id}&charity_percentage={charity_percentage}&language={language}&country={country}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function updateMyProfile($access_token, $name, $profile_description = null)
	{
		$parameters = array("access_token" => $access_token,
		                    "name" => $name,
		                    "profile_description" => $profile_description);
		$response = HttpClient::doRequest(HttpMethod::POST, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/me?access_token={access_token}&name={name}&profile_description={profile_description}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function uploadFile($access_token, $file, $name)
	{
		$parameters = array("access_token" => $access_token,
		                    "file" => $file,
		                    "name" => $name);
		$response = HttpClient::doRequest(HttpMethod::POST, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/file?access_token={access_token}&file={file}&name={name}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}

	public function uploadImage($access_token, $file, $name)
	{
		$parameters = array("access_token" => $access_token,
		                    "file" => $file,
		                    "name" => $name);
		$response = HttpClient::doRequest(HttpMethod::POST, "https://SwnOmB09bsY1a1TfWwxqlAeRo.proxy.mashape.com/mashape/image?access_token={access_token}&file={file}&name={name}", $parameters, true, $this->publicKey, $this->privateKey, true);
		return $response;
	}
}
?>