# -*- coding: utf-8 -*-
import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

class TestToCourse5Page(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Firefox()
    
    def test_to_course5_page(self):
        driver = self.driver
        driver.get("http://162.246.157.230")
        element = driver.find_element_by_xpath("//input[@value='Instructor']")
        element.click()
        element = WebDriverWait(driver, 10).until(
        EC.presence_of_element_located((By.ID, "course5")))
        element.click()
        self.assertTrue
        
    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()
