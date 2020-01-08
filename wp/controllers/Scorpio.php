<?php

/**
 * /!\ BETA VERSION /!\
 * 
 * SYNTAX:
 * $homeACF =  new Scorpio('Options','options','Edit Content','fields-home.php');
 */

class Scorpio
{
    private $fields = array();
    private $id;
    private $name;
    private $pageName;
    private $file;

    public function __construct($groupName, $groupKey, $pageName, $fieldsFile)
    {
        $file = fopen(TEMPLATEPATH . '/ACF-Fields/' . $fieldsFile, 'r');
        if (!$file)
            $file = fopen(TEMPLATEPATH . '/ACF-Fields/' . $fieldsFile, 'w');
        if (!$file)
            die('Wrong fields file!');
        fclose($file);
        $this->name = $groupName;
        $this->id = $groupKey;
        $this->pageName = $pageName;
        $this->init();
        require_once TEMPLATEPATH . '/ACF-Fields/' . $fieldsFile;
    }

    private function init()
    {
        # Register option pages
        if (function_exists('acf_add_options_sub_page')) {
            acf_add_options_page(array(
                'page_title' => $this->pageName,
                'menu_title' => $this->pageName,
                'menu_slug' => slugify($this->pageName),
                'capability' => 'manage_options',
            ));
        }

        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_' . $this->id,
                'title' => $this->name,
                'fields' => array(),
                'location' => array(
                    array(
                        array(
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => slugify($this->pageName),
                        ),
                    ),
                ),
            ));
        }
    }

    public function addText($name, $key)
    {
        $field['name'] = $name;
        $field['key'] = 'field_' . $key;

        if (!get_field_object($field['key'])) {
            acf_add_local_field(array(
                'key' => $field['key'],
                'label' => $name,
                'name' => $field['name'],
                'type' => 'text',
                'parent' => 'group_' . $this->id
            ));
        }
        $field['value'] = get_field($field['key'], 'options');
        array_push($this->fields, $field);

    }

    public function addPageLink($name, $key)
    {
        $field['name'] = $name;
        $field['key'] = 'field_' . $key;

        if (!get_field_object($field['key'])) {
            acf_add_local_field(array(
                'key' => $field['key'],
                'label' => $name,
                'name' => $field['name'],
                'type' => 'page_link',
                'parent' => 'group_' . $this->id
            ));
        }
        $field['value'] = get_field($field['key'], 'options');
        array_push($this->fields, $field);

    }

    public function addUrl($name, $key)
    {
        $field['name'] = $name;
        $field['key'] = 'field_' . $key;

        if (!get_field_object($field['key'])) {
            acf_add_local_field(array(
                'key' => $field['key'],
                'label' => $name,
                'name' => $field['name'],
                'type' => 'url',
                'parent' => 'group_' . $this->id
            ));
        }
        $field['value'] = get_field($field['key'], 'options');
        array_push($this->fields, $field);

    }

    public function addTab($name, $key, $placement = 'left')
    {
        $field['name'] = $name;
        $field['key'] = 'field_' . $key;
        acf_add_local_field(array(
            'key' => $field['key'],
            'label' => $field['name'],
            'type' => 'tab',
            'placement' => $placement,
            'parent' => 'group_' . $this->id
        ));
        array_push($this->fields, $field);
    }

    public function getField($fieldKey)
    {
    //  if (!array_key_exists(array_column($this->fields, 'key'), $fieldKey))
    //  return 'Field it doesn't exists!';
        $searched = array_search('field_' . $fieldKey, array_column($this->fields, 'key'));
        return $this->fields[$searched]['value'];
    }
}