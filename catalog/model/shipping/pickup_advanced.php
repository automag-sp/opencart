<?php
class ModelShippingPickupAdvanced extends Model
{
	function getQuote($address)
	{
		$points      = $this->config->get('pickup_advanced_module');
		$settings    = $this->config->get('pickup_advanced_settings');
		$language_id = $this->config->get('config_language_id');
		
		foreach ($points as $i => $point)
		{
			if (!$point['status'])
			{
				continue;
			}
			if (!$point['geo_zone_id'])
			{
				$status = true;
			}
			else
			{
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$point['geo_zone_id'] . "'" .
										  " AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
				if ($query->num_rows)
				{
					$status = true;
				}
				else
				{
					$points[$i]['status'] = false;
				}
			}
		}
		
		if ($this->config->get('pickup_advanced_status'))
		{
			$status = true;
		}
		else
		{
			$status = false;
		}
		
		$method_data = array();
		
		if ($status)
		{
			$quote_data = array();
			
			foreach ($points as $i => $point)
			{
				if (!$point['status'])
				{
					continue;
				}
				
				if ($point['link_status'] == 1 && !empty($point[$language_id]['link']) && !empty($point[$language_id]['link_text']))
				{
					$title = $point[$language_id]['description'] . ' <a href="' . $point[$language_id]['link'] . '" target="_blank">' . $point[$language_id]['link_text'] . '</a>';
				}
				else
				{
					$title = $point[$language_id]['description'];
				}
				
				$cart_total  = $this->cart->getTotal();
				$cart_weight = $this->cart->getWeight();
				
				if ($point['percentage'] && $point['cost'] > 0)
				{
					$cost = ($cart_total / 100) * $point['cost'];
				}
				elseif ($point['relation'])
				{
					$cost = 0;
					
					$rates = explode(',', $point['cost']);
					
					foreach ($rates as $rate)
					{
						$data = explode(':', $rate);
						
						if ($data[0] >= $cart_total)
						{
							if (isset($data[1]))
							{
								$cost = $data[1];
							}
							
							break;
						}
					}
				}
				elseif ($point['weight'])
				{
					$cost = 0;
					
					$rates = explode(',', $point['cost']);
					
					foreach ($rates as $rate)
					{
						$data = explode(':', $rate);
						
						if ($data[0] >= $cart_weight)
						{
							if (isset($data[1]))
							{
								$cost = $data[1];
							}
							
							break;
						}
					}
				}
				else
				{
					$cost = $point['cost'];
				}
				
				if ($cost > 0)
				{
					$text = $this->currency->format($cost);
				}
				else
				{
					if ($this->config->get('pickup_advanced_null_cost'))
					{
						$text = $this->currency->format($cost);
					}
					else
					{
						if ($settings[$language_id]['null_cost'])
						{
							$text = $settings[$language_id]['null_cost'];
						}
						else
						{
							$text = '';
						}
					}
				}
				
				$quote_data['point_' . $i] = array
				(
					'code'         => 'pickup_advanced.point_' . $i,
					'title'        => $title,
					'cost'         => $cost,
					'tax_class_id' => 0,
					'text'         => $text
				);
				
				$sort_order[$i] = $point['sort_order'];
			}
			
			if (isset($sort_order))
			{
				array_multisort($sort_order, SORT_ASC, $quote_data);
			}
			
			if (count($quote_data) > 0)
			{
				$method_data = array
				(
					'code'       => 'pickup_advanced',
					'title'      => $settings[$language_id]['title'],
					'quote'      => $quote_data,
					'sort_order' => $this->config->get('pickup_advanced_sort_order'),
					'error'      => false
				);
			}
		}
		
		return $method_data;
	}
}
?>
