<?php

var family_as_tree =
{"name":"Jack", "age": 90, "sex": "m", 
    "children": [
    {"name":"Olivier", "age": 60, "sex": "m", 
        "children": [
        {"name":"Angélique", "age": 18, "sex": "f", "children": []},
        {"name":"Charlotte", "age": 18, "sex": "f", "children": []},
        ]},
    {"name":"Pascal",  "age": 60, "sex": "m", 
        "children": [
            {"name":"Julien", "age": 34, "sex": "m", 
            "children": [
                {"name":"Barnabé", "age": 2, "sex": "m", "children": []},
            ]},
            {"name":"Caroline", "age": 34, "sex": "m", 
            "children": [
                {"name":"Constance", "age": 0, "sex": "f", "children": []},
                {"name":"Jeff", "age": -2, "sex": "m", "children": []},
            ]},
        ]},
    ]
};




class Tree{
  public $_root;
  public function __construct($rootNode){
    $this->_root = $rootNode;
  }
  public function traverse($callback){
    //
    $recursive = function($currentNode, $accu) use ($recursive, $callback){
      foreach($currentNode->children as $child){
        $recursive($child, array_merge([$child], $accu));
      }
      $callback($currentNode, $accu);
    }
    $recursive($this->_root, []);
  }
}