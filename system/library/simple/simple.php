<?php
class Simple {
    static $version = '3.8.3';

    const OBJECT_TYPE_ORDER           = 1;
    const OBJECT_TYPE_CUSTOMER        = 2;
    const OBJECT_TYPE_ADDRESS         = 3;
    
    const SET_REGISTRATION            = 'registration';
    const SET_CHECKOUT_CUSTOMER       = 'checkout_customer';
    const SET_CHECKOUT_ADDRESS        = 'checkout_address';
    const SET_ACCOUNT_INFO            = 'account_info';
    const SET_ACCOUNT_ADDRESS         = 'account_address';
    
    const REGISTER_NO                 = 0;
    const REGISTER_YES                = 1;
    const REGISTER_USER_CHOICE        = 2;
    
    const SUBSCRIBE_NO                = 0;
    const SUBSCRIBE_YES               = 1;
    const SUBSCRIBE_USER_CHOICE       = 2;
    
    const EMAIL_NOT_SHOW              = 0;
    const EMAIL_SHOW_AND_NOT_REQUIRED = 1;
    const EMAIL_SHOW_AND_REQUIRED     = 2;

    static $fields_of_address = array('main_firstname','main_lastname','main_company','main_company_id','main_tax_id','main_address_1','main_address_2','main_city','main_postcode','main_zone_id','main_country_id');
    static $fields_of_account = array('main_email','main_firstname','main_lastname','main_fax','main_telephone');

    static $default_sets = array(
        'simple_set_checkout_customer' => 'main_email,main_firstname,main_lastname,main_telephone,main_country_id,main_zone_id,main_city,main_postcode,main_address_1,main_comment',
        'simple_set_checkout_address'  => 'main_firstname,main_lastname,main_country_id,main_zone_id,main_city,main_postcode,main_address_1',
        'simple_set_registration'      => 'main_email,main_firstname,main_lastname,main_telephone,main_country_id,main_zone_id,main_city,main_address_1',
        'simple_set_account_info'      => 'main_email,main_firstname,main_lastname,main_telephone,main_fax',
        'simple_set_account_address'   => 'main_firstname,main_lastname,main_country_id,main_zone_id,main_city,main_postcode,main_address_1',
    );

    static $object_types = array(
        'order'    => self::OBJECT_TYPE_ORDER,
        'customer' => self::OBJECT_TYPE_CUSTOMER,
        'address'  => self::OBJECT_TYPE_ADDRESS
    );

    private $fields;
    private $display_fields;
    private $language_code;
    private $customer_groups;
    private $custom_data;

    private $mask_used = false;
    private $placeholder_used = false;
    private $datepicker_used = false;

    private $errors;

    private $need_api_calls;
    
    public $opencart_version;

    protected $registry;

    public function __construct($registry) {
        $this->registry = $registry;

        $opencart_version = explode('.', VERSION);
        $four = isset($opencart_version[3]) ? 0.1*$opencart_version[3] : 0;
        $main = $opencart_version[0].$opencart_version[1].$opencart_version[2];
        $this->opencart_version = (int)$main + $four;

        $this->display_fields = array();
        $this->fields = array();

        $this->need_api_calls = array();

        $this->errors = array();
    }

    public function __get($key) {
        return $this->registry->get($key);
    }

    public function __set($key, $value) {
        $this->registry->set($key, $value);
    }

    public function load_fields($from, $filter = false, $ignore_post = false, $main_data = false, $custom_data = false) {
        $reload = $this->get_simple_steps() ? array() : explode(',', $this->config->get('simple_set_for_reload'));

        $fields_main = $this->config->get('simple_fields_main');
        $fields_custom = $this->config->get('simple_fields_custom');

        $fields_settings = (is_array($fields_main) ? $fields_main : array()) + (is_array($fields_custom) ? $fields_custom : array());

        $this->fields[$from] = array();

        foreach ($fields_settings as $id => $field_settings) {
            $field_settings['from'] = $from;
            $value = $this->get_field_value($field_settings, $ignore_post, $main_data, $custom_data);
            $values = $this->get_field_values($field_settings);

            if ($field_settings['id'] == 'main_zone_id') {
                if (!array_key_exists($value, $values)) {
                    $value = '';
                }
                if (count($values) == 1 && array_key_exists(0, $values)) {
                    $value = 0;
                }
            }

            $this->fields[$from][$id] = array(
                'id'                 => $field_settings['id'],
                'from'               => $from,
                'label'              => !empty($field_settings['label'][$this->get_language_code()]) ? html_entity_decode($field_settings['label'][$this->get_language_code()]) : $field_settings['id'],
                'required'           => ($field_settings['validation_type'] > 0 ? true : false),
                'object_type'        => !empty($field_settings['object_type']) ? (!empty(self::$object_types[$field_settings['object_type']]) ? self::$object_types[$field_settings['object_type']] : 0) : 0,
                'object_field'       => !empty($field_settings['object_field']) ? $field_settings['object_field'] : '',
                'type'               => $field_settings['type'],
                'value'              => $value,
                'values'             => $values,
                'error'              => $this->validate_field($field_settings, $value, $values),
                'save_to'            => $field_settings['save_to'],
                'save_label'         => !empty($field_settings['save_label']) ? $field_settings['save_label'] : false,
                'mask'               => $this->get_field_mask($field_settings),
                'mask_from_api'      => !empty($field_settings['mask_from_api']),
                'placeholder'        => !empty($field_settings['placeholder'][$this->get_language_code()]) ? $field_settings['placeholder'][$this->get_language_code()] : '',
                'autocomplete'       => !empty($field_settings['autocomplete']) ? true : false,
                'reload'             => in_array($field_settings['id'], $reload) ? true : $this->get_field_reload($field_settings),
                'date_min'           => isset($field_settings['date_min']) ? $field_settings['date_min'] : '',
                'date_max'           => isset($field_settings['date_max']) ? $field_settings['date_max'] : '',
                'date_start'         => isset($field_settings['date_start']) ? $field_settings['date_start'] : '',
                'date_end'           => isset($field_settings['date_end']) ? $field_settings['date_end'] : '',
                'date_only_business' => isset($field_settings['date_only_business']) ? $field_settings['date_only_business'] : '',
                'date_only_for'      => isset($field_settings['date_only_for']) ? $field_settings['date_only_for'] : '',
                'place'              => isset($field_settings['place']) ? $field_settings['place'] : '',
                'status'             => $this->get_field_status($field_settings),
            );

            if ($this->fields[$from][$id]['type'] == 'date') {
                $this->datepicker_used = true;
            }

            if ($this->fields[$from][$id]['mask'] || $this->fields[$from][$id]['mask_from_api']) {
                $this->mask_used = true;
            }

            if ($this->fields[$from][$id]['placeholder']) {
                $this->placeholder_used = true;
            }
        }

        $this->exec_api_calls();

        $set = $this->config->get('simple_set_'.$from);
        $current_set = '';

        if (!empty($filter['group']) && !empty($set['group'][$filter['group']])) {
            $current_set = $set['group'][$filter['group']];
        }

        $customer_group_id = !empty($filter['group']) ? $filter['group'] : $this->config->get('config_customer_group_id');

        if (!empty($filter['shipping'])) {
            $shipping = explode('.',$filter['shipping']);
            if ($shipping[0]) {
                $shipping = $shipping[0];
            }

            if (!empty($set['shipping'][$customer_group_id][$shipping])) {
                $current_set = $set['shipping'][$customer_group_id][$shipping];
            }

            if (!empty($set['shipping'][$customer_group_id][$filter['shipping']])) {
                $current_set = $set['shipping'][$customer_group_id][$filter['shipping']];
            }
        }

        if (!empty($filter['payment']) && !empty($set['payment'][$customer_group_id][$filter['payment']])) {
            $current_set = $set['payment'][$customer_group_id][$filter['payment']];
        }

        if (empty($current_set)) {
            $current_set = self::$default_sets['simple_set_'.$from];
        }

        $this->display_fields[$from] = array();

        $headers = $this->config->get('simple_headers');

        $fields = explode(',', $current_set);

        if (($from == 'checkout_customer' || $from == 'registration') && is_array($fields) && !in_array('main_email', $fields)) {
            array_unshift($fields, 'main_email');
        }

        $tag = $this->config->get('simple_header_tag');
        $tag_open = $tag ? '<'.$tag.'>' : '';
        $tag_close = $tag ? '</'.$tag.'>' : '';
        
        if (is_array($fields) && count($fields) > 0) {
            foreach ($fields as $id) {
                if (!empty($this->fields[$from][$id]) && !empty($this->fields[$from][$id]['status'])) {
                    $this->display_fields[$from][$id] = $this->fields[$from][$id];
                }
                if (!empty($headers[$id])) { 
                    $this->display_fields[$from][$id] = array(
                        'id'        => $id, 
                        'type'      => 'header', 
                        'place'     => !empty($headers[$id]['place']) ? $headers[$id]['place'] : '', 
                        'required'  => false, 
                        'error'     => false, 
                        'label'     => !empty($headers[$id]['label'][$this->get_language_code()]) ? html_entity_decode($headers[$id]['label'][$this->get_language_code()]) : $headers[$id]['id'],
                        'save_to'   => false,
                        'tag_open'  => $tag_open,
                        'tag_close' => $tag_close
                    );
                }
                if ($id == 'split_split') {
                    $this->display_fields[$from][$id] = array(
                        'id'        => $id, 
                        'type'      => 'split', 
                        'required'  => false, 
                        'error'     => false, 
                        'label'     => false,
                        'save_to'   => false
                    );
                }
            }
        }

        $checkout_customer_use_selector = $this->config->get('simple_customer_use_geo_selector');
        $checkout_customer_selector_type = $this->config->get('simple_customer_geo_selector_type');
        $checkout_address_use_selector = $this->config->get('simple_shipping_address_use_geo_selector');
        $checkout_address_selector_type = $this->config->get('simple_shipping_address_geo_selector_type');

        if (!empty($this->fields[$from]) && is_array($this->fields[$from])) {
            foreach ($this->fields[$from] as $id => $settings) {
                if ($from == 'registration' && !in_array($id, self::$fields_of_address) && !in_array($id, self::$fields_of_account)) {
                    continue;
                }
                if ($from == 'account_info' && !in_array($id, self::$fields_of_account)) {
                    continue;
                }
                if (($from == 'account_address' || $from == 'checkout_address') && !in_array($id, self::$fields_of_address)) {
                    continue;
                }
                if (strpos($id, 'main_') === 0 && !array_key_exists($id, $this->display_fields[$from])) {
                    if (($from == 'checkout_customer' && $checkout_customer_use_selector && (($id == 'main_country_id' && $checkout_customer_selector_type < 3) || ($id == 'main_zone_id' && $checkout_customer_selector_type > 1))) || ($from == 'checkout_address' && $checkout_address_use_selector && (($id == 'main_country_id' && $checkout_address_selector_type < 3) || ($id == 'main_zone_id' && $checkout_address_selector_type > 1)))) {
                            $tmp = $settings;
                            $tmp['selector'] = true;
                            $this->display_fields[$from][$id] = $tmp;
                    } else {
                        $tmp = $settings;
                        $tmp['type'] = 'hidden';
                        $this->display_fields[$from][$id] = $tmp;
                    }
                }
            }
        }

        return $this->display_fields[$from];
    }

    private function exec_api_calls() {
        if (!empty($this->need_api_calls) && file_exists(DIR_APPLICATION . 'model/tool/simpledata.php')) {
            $this->load->model('tool/simpledata');

            foreach ($this->need_api_calls as $info) {
                $from     = $info['from'];
                $id       = $info['id'];
                $type     = $info['type'];
                $validate = $info['validate'];
                $init     = $info['init'];
                $mask     = $info['mask'];
                $status   = $info['status'];
                $reload   = $info['reload'];

                if ($type == 'select_from_api' && method_exists($this->model_tool_simpledata,'select_'.$id)) {
                    $this->fields[$from][$id]['values'] = $this->model_tool_simpledata->{'select_'.$id}($this->fields[$from]);
                }

                if ($type == 'radio_from_api' && method_exists($this->model_tool_simpledata,'radio_'.$id)) {
                    $this->fields[$from][$id]['values'] = $this->model_tool_simpledata->{'radio_'.$id}($this->fields[$from]);
                }

                if ($type == 'checkbox_from_api' && method_exists($this->model_tool_simpledata,'checkbox_'.$id)) {
                    $this->fields[$from][$id]['values'] = $this->model_tool_simpledata->{'checkbox_'.$id}($this->fields[$from]);
                }

                if ($validate && method_exists($this->model_tool_simpledata,'validate_'.$id)) {
                    $this->fields[$from][$id]['error'] = $this->model_tool_simpledata->{'validate_'.$id}($this->fields[$from][$id]['value'], $this->fields[$from]);
                }

                if ($init && method_exists($this->model_tool_simpledata,'init_'.$id)) {
                    $this->fields[$from][$id]['value'] = $this->model_tool_simpledata->{'init_'.$id}($this->fields[$from]);
                }

                if ($mask && method_exists($this->model_tool_simpledata,'mask_'.$id)) {
                    $this->fields[$from][$id]['mask'] = $this->model_tool_simpledata->{'mask_'.$id}($this->fields[$from]);
                }

                if ($status && method_exists($this->model_tool_simpledata,'status_'.$id)) {
                    $this->fields[$from][$id]['status'] = $this->model_tool_simpledata->{'status_'.$id}($this->fields[$from]);
                }

                if ($reload && method_exists($this->model_tool_simpledata,'reload_'.$id)) {
                    $this->fields[$from][$id]['reload'] = $this->model_tool_simpledata->{'reload_'.$id}($this->fields[$from]);
                }
            }
        }
    }

    private function get_field_value($field_settings, $ignore_post, $main_data, $custom_data) {
        $this->load->model('tool/simplegeo');
        $id = $field_settings['id'];
        $from = $field_settings['from'];
        $save_to = $field_settings['save_to'];
        $main = strpos($id, 'main_') === 0 ? true : false;
        $custom = strpos($id, 'custom_') === 0 ? true : false;
        $object_field = !empty($field_settings['object_field']) ? $field_settings['object_field'] : '';

        $value = '';
        if ($this->request->server['REQUEST_METHOD'] == 'POST' && !$ignore_post && isset($this->request->post[$from][$id])) {
            // fix for checkbox
            if (is_array($this->request->post[$from][$id])) {
                $value = $this->request->post[$from][$id];
            } else {
                $value = trim($this->request->post[$from][$id]);
            }
        } else {
            if ($main && isset($main_data[$save_to])) {
                $value = $main_data[$save_to];
            } elseif ($main && isset($main_data[$id])) {
                $value = $main_data[$id];
            } elseif ($custom && isset($custom_data[$id])) {
                $value = $custom_data[$id]['value'];
            } elseif ($custom && $object_field && isset($main_data[$object_field])) {
                $value = $main_data[$object_field];
            } elseif (!empty($field_settings['init_geoip']) && $geo = $this->model_tool_simplegeo->getGeoIp()) {
                if ($id == 'main_country_id' && !empty($geo['country_id'])) {
                    $value = $geo['country_id'];
                }

                if ($id == 'main_zone_id' && !empty($geo['zone_id'])) {
                    $value = $geo['zone_id'];
                }

                if ($id == 'main_city' && !empty($geo['city'])) {
                    $value = $geo['city'];
                }

                if ($id == 'main_postcode' && !empty($geo['postcode'])) {
                    $value = $geo['postcode'];
                }
            } elseif (!empty($field_settings['init_from_api'])) {
                $this->need_api_calls[$from.'_'.$field_settings['id']] = array(
                    'from'     => $from, 
                    'id'       => $field_settings['id'],
                    'init'     => true,
                    'type'     => $field_settings['type'],
                    'validate' => $field_settings['validation_type'] == 5,
                    'mask'     => !empty($field_settings['mask_from_api']),
                    'status'   => true,
                    'reload'   => true
                );
            } else {
                $value = !empty($field_settings['init']) ? $field_settings['init'] : '';
            }
        }

        // fix for checkbox
        if ($this->request->server['REQUEST_METHOD'] == 'POST' && !$ignore_post && $field_settings['type'] == 'checkbox' && !isset($this->request->post[$from][$id])) {
            $value = array();
        }

        // fix for default fields in $this->request->post
        if ($this->request->server['REQUEST_METHOD'] == 'POST' && $main) {
            $default_id = substr($id, 5);
            if (!isset($this->request->post[$default_id])) {
                $this->request->post[$default_id] = $value;
            }     
        }

        // fix for custom fields in $this->request->post
        if ($this->request->server['REQUEST_METHOD'] == 'POST' && $custom) {
            $default_id = substr($id, 7);
            if (!isset($this->request->post[$default_id])) {
                $this->request->post[$default_id] = $value;
            }     
        }

        return $value;
    }

    private function get_field_values($field_settings) {
        $from = $field_settings['from'];

        $return_values = array();
        if ($field_settings['type'] == 'select' || $field_settings['type'] == 'radio' || $field_settings['type'] == 'checkbox') {
            if ($field_settings['values'] == 'countries') {
                $this->load->model('localisation/country');
                $values = $this->model_localisation_country->getCountries();
                foreach ($values as $value) {
                    $return_values[$value['country_id']] = $value['name'];
                }
            } elseif ($field_settings['values'] == 'zones') {
                $this->load->model('localisation/zone');
                $values = $this->model_localisation_zone->getZonesByCountryId(!empty($this->fields[$from]['main_country_id']['value']) ? $this->fields[$from]['main_country_id']['value'] : 0);
                foreach ($values as $value) {
                    $return_values[$value['zone_id']] = $value['name'];
                }
                if (empty($return_values)) {
                      $return_values[0] = $this->language->get('text_none');
                }
            } elseif (!empty($field_settings['values'][$this->get_language_code()])) {
                $values = $field_settings['values'][$this->get_language_code()];
                $values = explode(';', $values);
                if (!empty($values) && count($values) > 0) {
                    foreach ($values as $value) {
                        $parts = explode('=', $value, 2);
                        if (!empty($parts) && count($parts) == 2) {
                            $return_values[$parts[0]] = $parts[1];
                        }
                    }
                }
            }
        } elseif ($field_settings['type'] == 'select_from_api' || $field_settings['type'] == 'radio_from_api' || $field_settings['type'] == 'checkbox_from_api') {
            $init = isset($this->need_api_calls[$from.'_'.$field_settings['id']]['init']) ? $this->need_api_calls[$from.'_'.$field_settings['id']]['init'] : false;
            $this->need_api_calls[$from.'_'.$field_settings['id']] = array(
                'from'     => $from, 
                'id'       => $field_settings['id'],
                'init'     => $init,
                'type'     => $field_settings['type'],
                'validate' => $field_settings['validation_type'] == 5,
                'mask'     => !empty($field_settings['mask_from_api']),
                'status'   => true,
                'reload'   => true
            );
        }

        return $return_values;
    }

    private function validate_field($field_settings, $value, $values) {
        $from = $field_settings['from'];

        $error_msg = !empty($field_settings['validation_error'][$this->get_language_code()]) ? $field_settings['validation_error'][$this->get_language_code()] : 'Error';

        if ($field_settings['validation_type'] == 0) {
            return '';
        } elseif ($field_settings['validation_type'] == 1) {
            if (empty($value)) {
                return $error_msg;
            }
        } elseif ($field_settings['validation_type'] == 2) {
            if (strlen(utf8_decode($value)) < $field_settings['validation_min'] || strlen(utf8_decode($value)) > $field_settings['validation_max']) {
                return $error_msg;
            }
        } elseif ($field_settings['validation_type'] == 3) {
            if (!preg_match($field_settings['validation_regexp'], $value)) {
                return $error_msg;
            }
        } elseif ($field_settings['validation_type'] == 4) {
            // fix for checkbox
            if ($field_settings['type'] != 'checkbox') {
                if (!array_key_exists($value, $values)) {
                    return $error_msg;
                }
            } else {
                foreach ($value as $v) {
                    if (!array_key_exists($v, $values)) {
                        return $error_msg;
                    }
                }
            }
        } elseif ($field_settings['validation_type'] == 5) {
            $init = isset($this->need_api_calls[$from.'_'.$field_settings['id']]['init']) ? $this->need_api_calls[$from.'_'.$field_settings['id']]['init'] : false;
            $this->need_api_calls[$from.'_'.$field_settings['id']] = array(
                'from'     => $from, 
                'id'       => $field_settings['id'],
                'init'     => $init,
                'type'     => $field_settings['type'],
                'validate' => $field_settings['validation_type'] == 5,
                'mask'     => !empty($field_settings['mask_from_api']),
                'status'   => true,
                'reload'   => true
            );
        }

        return '';
    }

    private function get_field_mask($field_settings) {
        $mask = '';
        $from = $field_settings['from'];

        if (!empty($field_settings['mask_from_api'])) {
            $init = isset($this->need_api_calls[$from.'_'.$field_settings['id']]['init']) ? $this->need_api_calls[$from.'_'.$field_settings['id']]['init'] : false;
            
            $this->need_api_calls[$from.'_'.$field_settings['id']] = array(
                'from'     => $from, 
                'id'       => $field_settings['id'],
                'init'     => $init,
                'type'     => $field_settings['type'],
                'validate' => $field_settings['validation_type'] == 5,
                'mask'     => !empty($field_settings['mask_from_api']),
                'status'   => true,
                'reload'   => true
            );
        } else {
            $mask = !empty($field_settings['mask']) ? $field_settings['mask'] : '';
        }

        return $mask;
    }

    private function get_field_status($field_settings) {
        $from = $field_settings['from'];

        if (!is_object($this->model_tool_simpledata) && file_exists(DIR_APPLICATION . 'model/tool/simpledata.php')) {
            $this->load->model('tool/simpledata');
        }

        if (is_object($this->model_tool_simpledata) && method_exists($this->model_tool_simpledata,'status_'.$field_settings['id'])) {
            $init = isset($this->need_api_calls[$from.'_'.$field_settings['id']]['init']) ? $this->need_api_calls[$from.'_'.$field_settings['id']]['init'] : false;
            
            $this->need_api_calls[$from.'_'.$field_settings['id']] = array(
                'from'     => $from, 
                'id'       => $field_settings['id'],
                'init'     => $init,
                'type'     => $field_settings['type'],
                'validate' => $field_settings['validation_type'] == 5,
                'mask'     => !empty($field_settings['mask_from_api']),
                'status'   => true,
                'reload'   => true
            );
        }

        return true;
    }

    private function get_field_reload($field_settings) {
        $from = $field_settings['from'];

        if (!is_object($this->model_tool_simpledata) && file_exists(DIR_APPLICATION . 'model/tool/simpledata.php')) {
            $this->load->model('tool/simpledata');
        }

        if (is_object($this->model_tool_simpledata) && method_exists($this->model_tool_simpledata,'reload_'.$field_settings['id'])) {
            $init = isset($this->need_api_calls[$from.'_'.$field_settings['id']]['init']) ? $this->need_api_calls[$from.'_'.$field_settings['id']]['init'] : false;
            
            $this->need_api_calls[$from.'_'.$field_settings['id']] = array(
                'from'     => $from, 
                'id'       => $field_settings['id'],
                'init'     => $init,
                'type'     => $field_settings['type'],
                'validate' => $field_settings['validation_type'] == 5,
                'mask'     => !empty($field_settings['mask_from_api']),
                'status'   => true,
                'reload'   => true
            );
        }

        return false;
    }

    public function reset_error($from, $id) {
        if (isset($this->display_fields[$from][$id])) {
            $this->display_fields[$from][$id]['error'] = '';
            $this->fields[$from][$id]['error'] = '';
        }
    }

    public function validate_fields($from) {
        foreach ($this->display_fields[$from] as $id => $settings) {
            if ($settings['type'] != 'hidden' && $settings['error'] != '') {
                return false;
            }
        }

        return true;
    }

    public function get_language_code() {
        if (empty($this->language_code)) {
            $this->language_code = str_replace('-', '_', strtolower($this->config->get('config_language')));
        }
        return $this->language_code;
    }

    public function get_customer_groups() {
        $not_exclude_group_id = isset($this->session->data['simple']['not_exclude_group_id']) ? $this->session->data['simple']['not_exclude_group_id'] : 0;

        if (!$not_exclude_group_id && $this->customer->isLogged()) {
            $not_exclude_group_id = $this->customer->getCustomerGroupId();
            $this->session->data['simple']['not_exclude_group_id'] = $not_exclude_group_id;
        }
        
        if (!isset($this->customer_groups)) {
            $this->customer_groups = array();

            $file  = DIR_APPLICATION . 'model/account/customer_group.php';

            if (file_exists($file) && $this->opencart_version >= 153) {
                $this->load->model('account/customer_group');

                if (method_exists($this->model_account_customer_group,'getCustomerGroups')) {
                    $customer_groups = $this->model_account_customer_group->getCustomerGroups();

                    $config_customer_group_display = $this->config->get('config_customer_group_display');

                    if (!empty($config_customer_group_display) && is_array($config_customer_group_display)) {
                        foreach ($customer_groups as $customer_group) {
                            if (in_array($customer_group['customer_group_id'], $config_customer_group_display) || $customer_group['customer_group_id'] == $not_exclude_group_id) {
                                $this->customer_groups[$customer_group['customer_group_id']] = $customer_group['name'];
                            }
                        }
                    } else {
                        foreach ($customer_groups as $customer_group) {
                            $this->customer_groups[$customer_group['customer_group_id']] = $customer_group['name'];
                        }
                    }
                }
            } else {
                $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer_group");

                $config_customer_group_display = $this->config->get('simple_customer_group_display');

                if (!empty($config_customer_group_display) && is_array($config_customer_group_display)) {
                    foreach ($query->rows as $row) {
                        if (in_array($row['customer_group_id'], $config_customer_group_display) || $row['customer_group_id'] == $not_exclude_group_id) {
                            $this->customer_groups[$row['customer_group_id']] = $row['name'];
                        }
                    }
                } else {
                    foreach ($query->rows as $row) {
                        $this->customer_groups[$row['customer_group_id']] = $row['name'];
                    }
                }
            }
        }

        return $this->customer_groups;
    }

    public function set_error($from, $id, $error) {
        $this->fields[$from][$id]['error'] = $error;
    }

    public function get_value($from, $id) {
        $value = null;

        foreach ($this->fields[$from] as $field) {
            if ($field['save_to'] == $id && $field['id'] == 'main_'.$id && isset($field['value'])) {
                $value = $field['value'];
                break;
            }
        }

        return isset($value) ? $value : '';
    }

    public function get_total_value($from, $id) {
        $value = null;

        foreach ($this->display_fields[$from] as $field) {
            if ($field['type'] == 'header' || $field['type'] == 'split') {
                continue;
            }
            if ($field['save_to'] == $id && isset($field['value'])) {
                $v = $field['value'];
                if (($field['type'] == 'select' || $field['type'] == 'radio') && !empty($field['values'][$field['value']])) {
                    $v = $field['values'][$field['value']];
                }
                if (($field['type'] == 'checkbox') && !empty($field['values']) && !empty($field['value']) && is_array($field['values']) && is_array($field['value'])) {
                    $tmp = array();
                    foreach ($field['value'] as $key) {
                        if (array_key_exists($key, $field['values'])) {
                            $tmp[] = $field['values'][$key];
                        }
                    }
                    $v = implode(', ', $tmp);
                    unset($tmp);
                }
                $lv = ($field['save_label'] ? $field['label'].': ' : '').$v;
                if (!empty($v)) {
                    if (!empty($value)) {
                        $value = trim($value).' '.$lv;
                    } else {
                        $value = $lv;
                    }
                }
            }
        }

        return isset($value) ? $value : '';
    }

    public function get_custom_data_for_object($from, $object_type) {
        $custom_data = array();
        
        foreach ($this->display_fields[$from] as $field) {
            if ($field['type'] == 'header' || $field['type'] == 'split') {
                continue;
            }
            $text = !is_array($field['value']) ? $field['value'] : '';
            if (($field['type'] == 'select' || $field['type'] == 'radio') && !empty($field['values'][$field['value']])) {
                $text = $field['values'][$field['value']];
            }
            if (($field['type'] == 'checkbox') && !empty($field['values']) && !empty($field['value']) && is_array($field['values']) && is_array($field['value'])) {
                $tmp = array();
                foreach ($field['value'] as $value) {
                    if (array_key_exists($value, $field['values'])) {
                        $tmp[] = $field['values'][$value];
                    }
                }
                $text = implode(', ', $tmp);
                unset($tmp);
            }
            if ($field['object_type'] == $object_type && !empty($field['object_field'])) {
                if ($field['object_type'] == $object_type) {
                    $custom_data[$field['object_field']] = $field['value'];
                }
            }
        }

        return $custom_data;
    }

    public function get_custom_data($from, $object_type) {
        $custom_data = array();
        
        foreach ($this->display_fields[$from] as $field) {
            if ($field['type'] == 'header' || $field['type'] == 'split') {
                continue;
            }
            $text = !is_array($field['value']) ? $field['value'] : '';
            if (($field['type'] == 'select' || $field['type'] == 'radio') && !empty($field['values'][$field['value']])) {
                $text = $field['values'][$field['value']];
            }
            if (($field['type'] == 'checkbox') && !empty($field['values']) && !empty($field['value']) && is_array($field['values']) && is_array($field['value'])) {
                $tmp = array();
                foreach ($field['value'] as $value) {
                    if (array_key_exists($value, $field['values'])) {
                        $tmp[] = $field['values'][$value];
                    }
                }
                $text = implode(', ', $tmp);
                unset($tmp);
            }
            if ($field['object_type'] == $object_type) {
                $custom_data[$field['id']] = array(
                    'id' => $field['id'],
                    'label' => $field['label'],
                    'value' => $field['value'],
                    'text' => $text
                );
            }
        }

        return $custom_data;
    }

    public function save_custom_data($from, $object_type, $object_id, $use_customer_id = 0, $copy_to_payment_address = false) {
        
        if (empty($this->custom_data[$object_type][$object_id])) {
            $this->custom_data[$object_type][$object_id] = array();
        }

        foreach ($this->display_fields[$from] as $field) {
            if ($field['type'] == 'header' || $field['type'] == 'split') {
                continue;
            }
            $text = !is_array($field['value']) ? $field['value'] : '';
            if (($field['type'] == 'select' || $field['type'] == 'radio') && !empty($field['values'][$field['value']])) {
                $text = $field['values'][$field['value']];
            }
            if (($field['type'] == 'checkbox') && !empty($field['values']) && !empty($field['value']) && is_array($field['values']) && is_array($field['value'])) {
                $tmp = array();
                foreach ($field['value'] as $value) {
                    if (array_key_exists($value, $field['values'])) {
                        $tmp[] = $field['values'][$value];
                    }
                }
                $text = implode(', ', $tmp);
                unset($tmp);
            }
            if (($object_type == self::OBJECT_TYPE_ORDER && ($field['object_type'] == self::OBJECT_TYPE_ORDER || $field['object_type'] == self::OBJECT_TYPE_CUSTOMER || $field['object_type'] == self::OBJECT_TYPE_ADDRESS)) || ($object_type != self::OBJECT_TYPE_ORDER && $field['object_type'] == $object_type)) {
                $id = $field['id'];
                $label = $field['label'];
                if ($object_type == self::OBJECT_TYPE_ORDER && ($field['object_type'] == self::OBJECT_TYPE_ADDRESS || $field['object_type'] == self::OBJECT_TYPE_ORDER)) {
                    if ($from == self::SET_CHECKOUT_CUSTOMER) {
                        $id = 'payment_'.$id;
                    } elseif ($from == self::SET_CHECKOUT_ADDRESS) {
                        $id = 'shipping_'.$id;
                    }
                }

                if ($field['object_type'] == self::OBJECT_TYPE_ADDRESS) {
                    $set = 'address';
                    if ($from == self::SET_CHECKOUT_CUSTOMER) {
                        $set = 'payment_address';
                    } elseif ($from == self::SET_CHECKOUT_ADDRESS) {
                        $set = 'shipping_address';
                    }
                } elseif ($field['object_type'] == self::OBJECT_TYPE_CUSTOMER) {
                    $set = 'customer';
                    if ($object_type == self::OBJECT_TYPE_ORDER) {
                        $set = 'order';
                    }
                } elseif ($field['object_type'] == self::OBJECT_TYPE_ORDER) {
                    $set = 'order';
                }

                $this->custom_data[$object_type][$object_id][$id] = array(
                    'id'       => $id,
                    'label'    => $label,
                    'value'    => $field['value'],
                    'values'   => $field['values'],
                    'text'     => $text,
                    'type'     => $field['type'],
                    'set'      => $set,
                    'from'     => $from,
                    'field_id' => $field['id']
                );

                if ($copy_to_payment_address && $from == self::SET_CHECKOUT_CUSTOMER && $object_type == self::OBJECT_TYPE_ORDER && $field['object_type'] == self::OBJECT_TYPE_ADDRESS) {
                    $id = 'shipping_'.$field['id'];
                    $set = 'shipping_address';
                    $this->custom_data[$object_type][$object_id][$id] = array(
                        'id'       => $id,
                        'label'    => $label,
                        'value'    => $field['value'],
                        'values'   => $field['values'],
                        'text'     => $text,
                        'type'     => $field['type'],
                        'set'      => $set,
                        'from'     => $from,
                        'field_id' => $field['id']
                    );  
                }
            } 
        }
        
        $this->db_save_data($object_type, $object_id, $this->custom_data[$object_type][$object_id], $use_customer_id);
    }

    public function load_custom_data($object_type, $object_id) {
        if (empty($this->custom_data[$object_type][$object_id])) {
            $this->custom_data[$object_type][$object_id] = $this->db_load_data($object_type, $object_id);
        }
        return $this->custom_data[$object_type][$object_id];
    }

    private function db_save_data($type, $id, $data, $use_customer_id = 0) {
        if (!$type || !$id) {
            return false;
        }

        $data = serialize($data);

        $customer_id = $this->customer->isLogged() ? $this->customer->getId() : ($use_customer_id ? $use_customer_id : 0);

        $this->db->query("INSERT INTO
                            simple_custom_data
                        SET
                            object_type = '" . $this->db->escape($type) . "',
                            object_id = '" . (int)$id . "',
                            customer_id = '" . (int)$customer_id . "',
                            data = '" . $this->db->escape($data) . "'
                        ON DUPLICATE KEY UPDATE
                            data = '" . $this->db->escape($data) . "'");
    }

    private function db_load_data($type, $id) {
        if (!$type || !$id) {
            return array();
        }

        $query = $this->db->query("SELECT DISTINCT
                                        data
                                    FROM
                                        simple_custom_data
                                    WHERE
                                        object_type = '" . $this->db->escape($type) . "'
                                    AND
                                        object_id = '" . (int)$id . "'
                                    AND
                                        customer_id = '" . (int)$this->customer->getId() ."'");

        if ($query->num_rows) {
            return unserialize($query->row['data']);
        }

        return array();
    }

    public function get_customer_info($email) {
        $customer_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE LOWER(email) = '" . $this->db->escape(strtolower($email)) . "' AND status = '1'");
        
        if ($customer_query->num_rows) {
            return array(
                'customer_id'       => $customer_query->row['customer_id'], 
                'address_id'        => $customer_query->row['address_id'],
                'customer_group_id' => $customer_query->row['customer_group_id']
            );
        }

        return array(
            'customer_id'       => 0, 
            'address_id'        => 0,
            'customer_group_id' => 0
        );
    }

    public function delete_order($order_id) {
        $version = $this->opencart_version;

        $order_pending = $this->cache->get('order_pending');
        
        if (!isset($order_pending)) {
            $query = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "order_pending'");   
            $order_pending = $query->rows ? true : false;
            $this->cache->set('order_pending', $order_pending);
        }

        $this->db->query("SET SQL_BIG_SELECTS=1");
        $this->db->query("DELETE
                                `" . DB_PREFIX . "order`,
                                " . DB_PREFIX . "order_product,
                                " . DB_PREFIX . "order_option,
                                " . DB_PREFIX . "order_download,
                                " . DB_PREFIX . "order_total"
                                . ($version >= 152 ? "," . DB_PREFIX . "order_voucher" : "") .
                        " FROM
                            `" . DB_PREFIX . "order`
                        LEFT JOIN
                            " . DB_PREFIX . "order_product
                        ON
                            " . DB_PREFIX . "order_product.order_id = `" . DB_PREFIX . "order`.order_id
                        LEFT JOIN
                            " . DB_PREFIX . "order_option
                        ON
                            " . DB_PREFIX . "order_option.order_id = `" . DB_PREFIX . "order`.order_id
                        LEFT JOIN
                            " . DB_PREFIX . "order_download
                        ON
                            " . DB_PREFIX . "order_download.order_id = `" . DB_PREFIX . "order`.order_id
                        LEFT JOIN
                            " . DB_PREFIX . "order_total
                        ON
                            " . DB_PREFIX . "order_total.order_id = `" . DB_PREFIX . "order`.order_id "
                        . ($version >= 152 ? " LEFT JOIN
                            " . DB_PREFIX . "order_voucher
                        ON
                            " . DB_PREFIX . "order_voucher.order_id = `" . DB_PREFIX . "order`.order_id" : "")
                        . ($order_pending ? " LEFT JOIN
                            " . DB_PREFIX . "order_pending
                        ON
                            " . DB_PREFIX . "order_pending.order_id = `" . DB_PREFIX . "order`.order_id" : "") .
                        " WHERE
                            `" . DB_PREFIX . "order`.order_id = '" . (int)$order_id . "'
                        AND
                            `" . DB_PREFIX . "order`.order_status_id = 0");

        if ($this->db->countAffected() > 0) {
            $this->db->query("SET insert_id = " . (int)$order_id);
        }
    }

    public function edit_customer_group_id($customer_group_id) {
        $this->db->query("UPDATE " . DB_PREFIX . "customer SET customer_group_id = '" . (int)$customer_group_id . "' WHERE customer_id = '" . (int)$this->customer->getId() . "'");
    }

    public function html_field($field) {
        $text_select = $this->language->get('text_select');
 
        $html = '';
        if ($field['type'] == 'text' || $field['type'] == 'date') {
            $html = '<input type="text"'.(!empty($field['error']) ? ' class="simplecheckout-red-border"' : '').' id="'.$field['from'].'_'.$field['id'].'" '.($field['id'] == 'main_postcode' && $this->check_googleapi_enabled() ? 'googleapi="'.$field['from'].'"' : '').' name="'.$field['from'].'['.$field['id'].']" value="'.($field['value']).'" '.(!empty($field['mask']) ? ' mask="'.$field['mask'].'"' : '').(!empty($field['placeholder']) ? ' placeholder="'.$field['placeholder'].'"' : '').($field['autocomplete'] ? ' autocomplete="1"' : '').($field['reload'] ? ' reload="'.$field['from'].'_changed"' : '').($field['type'] == 'date' ? ' jdate="1"' : '').(!empty($field['date_min']) ? ' date_min="'.$field['date_min'].'"' : '').(!empty($field['date_max']) ? ' date_max="'.$field['date_max'].'"' : '').($field['type'] == 'date' && isset($field['date_start']) ? ' date_start="'.$field['date_start'].'"' : '').($field['type'] == 'date' && isset($field['date_end']) ? ' date_end="'.$field['date_end'].'"' : '').(!empty($field['date_only_business']) ? ' date_only_business="'.$field['date_only_business'].'"' : '').(!empty($field['date_only_for']) ? ' date_only_for="'.$field['date_only_for'].'"' : '').'>';
        }
        if ($field['type'] == 'textarea') {
            $html = '<textarea type="text"'.(!empty($field['error']) ? ' class="simplecheckout-red-border"' : '').' id="'.($field['from']).'_'.$field['id'].'" name="'.$field['from'].'['.$field['id'].']"'.($field['reload'] ? ' reload="'.$field['from'].'_changed"' : '').(!empty($field['placeholder']) ? ' placeholder="'.$field['placeholder'].'"' : '').'>'.($field['value']).'</textarea>';
        }
        if ($field['type'] == 'select' || $field['type'] == 'select_from_api') {
            $html = '<select '.(!empty($field['error']) ? ' class="simplecheckout-red-border"' : '').' id="'.($field['from']).'_'.$field['id'].'" name="'.$field['from'].'['.$field['id'].']"'.($field['id'] == 'main_country_id' ? ' onchange="$(\'#'.($field['from']).'_main_zone_id\').load(\'index.php?route=checkout/simplecheckout_customer/zone&country_id=\' + this.value);"' : '').($field['reload'] ? ' reload="'.$field['from'].'_changed"' : '').'>';
                $html .= '<option value="">'.$text_select.'</option>';
                foreach ($field['values'] as $key => $value) {
                    $html .= '<option value="'.$key.'"'.($key == $field['value'] ? ' selected="selected"' : '').'>'.$value.'</option>';
                }
            $html .= '</select>';
        }
        if ($field['type'] == 'radio' || $field['type'] == 'radio_from_api') {
            foreach ($field['values'] as $key => $value) {
                $html .= '<label><input type="radio" id="'.$field['from'].'_'.$field['id'].'" name="'.$field['from'].'['.$field['id'].']" value="'.$key.'"'.($key == $field['value'] ? ' checked="checked"' : '').($field['reload'] ? ' reload="'.$field['from'].'_changed"' : '').'>&nbsp;'.$value.'</label><br>';
            }
        }
        if ($field['type'] == 'checkbox' || $field['type'] == 'checkbox_from_api') {
            foreach ($field['values'] as $key => $value) {
                $html .= '<label><input type="checkbox" id="'.$field['from'].'_'.$field['id'].'_'.$key.'" name="'.$field['from'].'['.$field['id'].'][]" value="'.$key.'"'.(is_array($field['value']) && in_array($key, $field['value']) ? ' checked="checked"' : '').($field['reload'] ? ' reload="'.$field['from'].'_changed"' : '').'>&nbsp;'.$value.'</label><br>';
            }
        }
        if ($field['type'] == 'hidden') {
            $html ='<input type="hidden" id="'.$field['from'].'_'.$field['id'].'" name="'.$field['from'].'['.$field['id'].']" value="'.$field['value'].'">';
        }

        return $html;
    }

    public function add_static($template, $page) {
        $minify = $this->config->get('simple_minify');
        $minify = is_null($minify) ? false : $minify;

        $version = '';
        if (!$minify) {
            $version = '?v='.self::$version;
        }

        $this->document->addStyle('catalog/view/theme/'.$template.'/stylesheet/simple.css'.$version);
        $this->document->addScript('catalog/view/javascript/simple.js'.$version);
        $this->document->addScript('catalog/view/javascript/'.$page.'.js'.$version);

        if ($this->mask_used) {
            $this->document->addScript('catalog/view/javascript/jquery/jquery.maskedinput-1.3.min.js');
        }

        if (true) { //$this->placeholder_used) {
            $this->document->addScript('catalog/view/javascript/jquery/jquery.placeholder.min.js');
        }

        if ($this->datepicker_used) {
            $this->document->addScript('catalog/view/javascript/jquery/ui/i18n/jquery.ui.datepicker-'.$this->get_language_code().'.js');
        }

        if ($this->check_googleapi_enabled()) {
            $this->document->addScript('https://maps.googleapis.com/maps/api/js?key='.$this->get_googleapi_key().'&sensor=false');
        }

        if ($page == 'simpleregister' || $page == 'simplecheckout') {
            if ($this->opencart_version >= 155) {
                $this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
                $this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
            }

            if ($template == 'shoppica') {
                $this->document->addScript('catalog/view/theme/shoppica/js/jquery/jquery.prettyPhoto.js');
                $this->document->addStyle('catalog/view/theme/shoppica/stylesheet/prettyPhoto.css');
            }

            if ($template == 'shoppica2') {
                $this->document->addScript('catalog/view/theme/shoppica2/javascript/prettyphoto/js/jquery.prettyPhoto.js');
                $this->document->addStyle('catalog/view/theme/shoppica2/javascript/prettyphoto/css/prettyPhoto.css');      
            }
        }
        
    }

    public function tpl_joomla_route() {
        return $this->config->get('simple_joomla_route');
    }

    public function tpl_joomla_path() {
        return $this->config->get('simple_joomla_path');
    }

    public function tpl_header() {
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/simple_header.tpl')) {
            $template = DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/simple_header.tpl';
        } else {
            $template = DIR_TEMPLATE . 'default/template/common/simple_header.tpl';
        }

        return $template;
    }

    public function tpl_static() {
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/simple_static.tpl')) {
            $template = DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/simple_static.tpl';
        } else {
            $template = DIR_TEMPLATE . 'default/template/common/simple_static.tpl';
        }

        return $template;
    }

    public function tpl_footer() {
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/simple_footer.tpl')) {
            $template = DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/simple_footer.tpl';
        } else {
            $template = DIR_TEMPLATE . 'default/template/common/simple_footer.tpl';
        }

        return $template;
    }

    public function get_checkout_asap() {
        $asap = true;

        if ($this->customer->isLogged()) {
            $asap = $this->config->get('simple_checkout_asap_for_logged');
        } else {
            $asap = $this->config->get('simple_checkout_asap_for_not_logged');
        }

        return $asap ? 1 : 0;
    }

    public function load_language($path) {
        $language = $this->language;
        if (isset($language) && method_exists($language, 'load')) {
            $this->language->load($path);
            unset($language);
            return;
        }

        $load = $this->load;
        if (isset($load) && method_exists($load, 'language')) {
            $this->load->language($path);
            unset($load);
            return;
        }
    }

    public function add_error($from) {
        $this->errors[$from] = 'simplecheckout_'.$from;
    }

    public function get_errors() {
        return $this->errors;
    }

    public function check_googleapi_enabled() {
        return $this->config->get('simple_googleapi') && $this->config->get('simple_googleapi_key') ? 1 : 0;
    }

    public function get_googleapi_key() {
        return $this->config->get('simple_googleapi_key');
    }

    public function get_simple_steps() {
        return $this->config->get('simple_steps') ? 1 : 0;
    }

    public function get_simple_steps_summary() {
        return $this->config->get('simple_steps_summary') ? 1 : 0;
    }

    public function get_simple_comment_target() { 
        return $this->config->get('simple_comment_target') ? $this->config->get('simple_comment_target') : '';
    }

    public function is_mobile() {
        $user_agent = strtolower(getenv('HTTP_USER_AGENT'));
        $accept = strtolower(getenv('HTTP_ACCEPT'));

        if ((strpos($accept,'text/vnd.wap.wml')!==false) || (strpos($accept,'application/vnd.wap.xhtml+xml')!==false)) {
            return 1;
        }

        if (isset($_SERVER['HTTP_X_WAP_PROFILE']) ||
            isset($_SERVER['HTTP_PROFILE'])) {
            return 2;
        }

        if (preg_match('/(mini 9.5|vx1000|lge |m800|e860|u940|ux840|compal|'.
        'wireless| mobi|ahong|lg380|lgku|lgu900|lg210|lg47|lg920|lg840|'.
        'lg370|sam-r|mg50|s55|g83|t66|vx400|mk99|d615|d763|el370|sl900|'.
        'mp500|samu3|samu4|vx10|xda_|samu5|samu6|samu7|samu9|a615|b832|'.
        'm881|s920|n210|s700|c-810|_h797|mob-x|sk16d|848b|mowser|s580|'.
        'r800|471x|v120|rim8|c500foma:|160x|x160|480x|x640|t503|w839|'.
        'i250|sprint|w398samr810|m5252|c7100|mt126|x225|s5330|s820|'.
        'htil-g1|fly v71|s302|-x113|novarra|k610i|-three|8325rc|8352rc|'.
        'sanyo|vx54|c888|nx250|n120|mtk |c5588|s710|t880|c5005|i;458x|'.
        'p404i|s210|c5100|teleca|s940|c500|s590|foma|samsu|vx8|vx9|a1000|'.
        '_mms|myx|a700|gu1100|bc831|e300|ems100|me701|me702m-three|sd588|'.
        's800|8325rc|ac831|mw200|brew |d88|htc\/|htc_touch|355x|m50|km100|'.
        'd736|p-9521|telco|sl74|ktouch|m4u\/|me702|8325rc|kddi|phone|lg |'.
        'sonyericsson|samsung|240x|x320vx10|nokia|sony cmd|motorola|'.
        'up.browser|up.link|mmp|symbian|smartphone|midp|wap|vodafone|o2|'.
        'pocket|kindle|mobile|psp|treo)/', $user_agent)) {
            return 3;
        }

        if (in_array(substr($user_agent,0,4),
        Array("1207", "3gso", "4thp", "501i", "502i", "503i", "504i", "505i", "506i",
              "6310", "6590", "770s", "802s", "a wa", "abac", "acer", "acoo", "acs-",
              "aiko", "airn", "alav", "alca", "alco", "amoi", "anex", "anny", "anyw",
              "aptu", "arch", "argo", "aste", "asus", "attw", "au-m", "audi", "aur ",
              "aus ", "avan", "beck", "bell", "benq", "bilb", "bird", "blac", "blaz",
              "brew", "brvw", "bumb", "bw-n", "bw-u", "c55/", "capi", "ccwa", "cdm-",
              "cell", "chtm", "cldc", "cmd-", "cond", "craw", "dait", "dall", "dang",
              "dbte", "dc-s", "devi", "dica", "dmob", "doco", "dopo", "ds-d", "ds12",
              "el49", "elai", "eml2", "emul", "eric", "erk0", "esl8", "ez40", "ez60",
              "ez70", "ezos", "ezwa", "ezze", "fake", "fetc", "fly-", "fly_", "g-mo",
              "g1 u", "g560", "gene", "gf-5", "go.w", "good", "grad", "grun", "haie",
              "hcit", "hd-m", "hd-p", "hd-t", "hei-", "hiba", "hipt", "hita", "hp i",
              "hpip", "hs-c", "htc ", "htc-", "htc_", "htca", "htcg", "htcp", "htcs",
              "htct", "http", "huaw", "hutc", "i-20", "i-go", "i-ma", "i230", "iac",
              "iac-", "iac/", "ibro", "idea", "ig01", "ikom", "im1k", "inno", "ipaq",
              "iris", "jata", "java", "jbro", "jemu", "jigs", "kddi", "keji", "kgt",
              "kgt/", "klon", "kpt ", "kwc-", "kyoc", "kyok", "leno", "lexi", "lg g",
              "lg-a", "lg-b", "lg-c", "lg-d", "lg-f", "lg-g", "lg-k", "lg-l", "lg-m",
              "lg-o", "lg-p", "lg-s", "lg-t", "lg-u", "lg-w", "lg/k", "lg/l", "lg/u",
              "lg50", "lg54", "lge-", "lge/", "libw", "lynx", "m-cr", "m1-w", "m3ga",
              "m50/", "mate", "maui", "maxo", "mc01", "mc21", "mcca", "medi", "merc",
              "meri", "midp", "mio8", "mioa", "mits", "mmef", "mo01", "mo02", "mobi",
              "mode", "modo", "mot ", "mot-", "moto", "motv", "mozz", "mt50", "mtp1",
              "mtv ", "mwbp", "mywa", "n100", "n101", "n102", "n202", "n203", "n300",
              "n302", "n500", "n502", "n505", "n700", "n701", "n710", "nec-", "nem-",
              "neon", "netf", "newg", "newt", "nok6", "noki", "nzph", "o2 x", "o2-x",
              "o2im", "opti", "opwv", "oran", "owg1", "p800", "palm", "pana", "pand",
              "pant", "pdxg", "pg-1", "pg-2", "pg-3", "pg-6", "pg-8", "pg-c", "pg13",
              "phil", "pire", "play", "pluc", "pn-2", "pock", "port", "pose", "prox",
              "psio", "pt-g", "qa-a", "qc-2", "qc-3", "qc-5", "qc-7", "qc07", "qc12",
              "qc21", "qc32", "qc60", "qci-", "qtek", "qwap", "r380", "r600", "raks",
              "rim9", "rove", "rozo", "s55/", "sage", "sama", "samm", "sams", "sany",
              "sava", "sc01", "sch-", "scoo", "scp-", "sdk/", "se47", "sec-", "sec0",
              "sec1", "semc", "send", "seri", "sgh-", "shar", "sie-", "siem", "sk-0",
              "sl45", "slid", "smal", "smar", "smb3", "smit", "smt5", "soft", "sony",
              "sp01", "sph-", "spv ", "spv-", "sy01", "symb", "t-mo", "t218", "t250",
              "t600", "t610", "t618", "tagt", "talk", "tcl-", "tdg-", "teli", "telm",
              "tim-", "topl", "tosh", "treo", "ts70", "tsm-", "tsm3", "tsm5", "tx-9",
              "up.b", "upg1", "upsi", "utst", "v400", "v750", "veri", "virg", "vite",
              "vk-v", "vk40", "vk50", "vk52", "vk53", "vm40", "voda", "vulc", "vx52",
              "vx53", "vx60", "vx61", "vx70", "vx80", "vx81", "vx83", "vx85", "vx98",
              "w3c ", "w3c-", "wap-", "wapa", "wapi", "wapj", "wapm", "wapp", "wapr",
              "waps", "wapt", "wapu", "wapv", "wapy", "webc", "whit", "wig ", "winc",
              "winw", "wmlb", "wonu", "x700", "xda-", "xda2", "xdag", "yas-", "your",
              "zeto", "zte-"))) {
            return 4;
        }

        return false;
    }
}
?>