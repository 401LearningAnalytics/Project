# -*- coding: utf-8 -*-
import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys

class TestToCourse1Page(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Firefox()
    
    def test_to_course1_page(self):
        driver = self.driver
        driver.get("http://162.246.157.230")
        element = driver.find_element_by_xpath("//input[@value=' Instructor']")
        element.click()
        element = driver.find_element_by_xpath("//button[contains(.,Introduction to Software Product Management)]")
        element.click()
        self.assertTrue()
    
    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()