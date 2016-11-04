# -*- coding: utf-8 -*-
from selenium import selenium
import unittest, time, re

class TestUpload(unittest.TestCase):
    def setUp(self):
        self.verificationErrors = []
        self.selenium = selenium("localhost", 4444, "*chrome", "http://162.246.157.230/")
        self.selenium.start()
    
    def test_upload(self):
        sel = self.selenium
        sel.open("/Project/ui/startpage.html")
        sel.click("//input[@value='Admin']")
        sel.wait_for_page_to_load("30000")
        sel.type("id=file", "/home/will/Desktop/Exports/Research Data/2016-05-08/introduction_to_software_product_management_1462830498259/courses.csv")
        sel.click("name=submit")
        sel.wait_for_page_to_load("30000")
    
    def tearDown(self):
        self.selenium.stop()
        self.assertEqual([], self.verificationErrors)

if __name__ == "__main__":
    unittest.main()
