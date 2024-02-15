<?php
// Simple Page Redirects

function redirect($page) {
    header('location: ' . URLROOT . '/' . $page);
}