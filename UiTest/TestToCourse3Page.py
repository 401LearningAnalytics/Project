# -*- coding: utf-8 -*-
import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys

class TestToCourse3Page(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.FireFox()
    
    def test_to_course3_page(self):
        driver = self.driver
        driver.get("http://162.246.157.230")
        element = driver.find_elementbyxpath("//input[@value='Instructor']")
        element.click()
        element = driver.find_elementbyxpath("//div[@id='users']/ul/table/tbody/tr/td[3]/button")
        self.assertIn("Client Needs and Software Requirements", driver.title)
    
    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()
