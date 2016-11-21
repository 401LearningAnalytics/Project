# -*- coding: utf-8 -*-
import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys

class TestToAdminPage(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Firefox()
    
    def test_to_admin_page(self):
        driver = self.driver
        driver.get("http://162.246.157.230")
        element = driver.find_element_by_xpath("//input[@value='Admin']")
        element.click()
        self.assertTrue
    
    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()
