from selenium.webdriver.support.ui import WebdriverWait
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.keys import Keys
import time
import os

# webdriverr.

chromedriver_path = "T:\\driver_web\\chromedriver.exe"
service = Service(executable_path=chromedriver_path)
driverr = webdriver.Chrome(service=service)
driverr.get("http://127.0.0.1:8080/IT-exo-PHP_bug/projet_tinh_TVA/form.php")
driverr.maximize_window()

test = {"firstName":"Florent1", "lastName":"Bailly", "username":"Huy" , "adress":"11 rue de it 69000 Lyon", "zip":"123", "cc-name":"Huyen", "cc-number":"00001111", "cc-expiration":"9/24" , "cc-cvv":"zip"}

driverr.find_element(By.ID, "firstName").send_keys(test["firstName"])
time.sleep(0.1)
driverr.find_element(By.ID, "lastName").send_keys(test["lastName"])
time.sleep(0.1)
driverr.find_element(By.ID, "username").send_keys(test["username"])
time.sleep(0.1)
driverr.find_element(By.ID, "address").send_keys(test["adress"])

driverr.find_element(By.XPATH, '//*[@id="country"]/option[2]').click()
time.sleep(0.1)
driverr.find_element(By.XPATH, '//*[@id="state"]/option[2]').click()
time.sleep(0.1)

driverr.find_element(By.ID, "zip").send_keys(test["zip"])
time.sleep(0.1)
driverr.find_element(By.ID, "cc-name").send_keys(test["cc-name"])
time.sleep(0.1)
driverr.find_element(By.ID, "cc-number").send_keys(test["cc-number"])
time.sleep(0.1)
driverr.find_element(By.ID, "cc-expiration").send_keys(test["cc-expiration"])
time.sleep(0.1)
driverr.find_element(By.ID, "cc-cvv").send_keys(test["cc-cvv"]) 

time.sleep(0.5)
driverr.execute_script("document.getElementById('details').value= 'le champs est renseigné';")

buttonContinue = driverr.find_element(By.CSS_SELECTOR, ".btn.btn-primary.btn-lg.btn-block")
driverr.execute_script("arguments[0].click();", buttonContinue)

TVA = driverr.find_element(By.XPATH, "//li[@id='taxItem']//span").text
TVA = TVA[1:]
TVA = float(TVA)


Element1 = driverr.find_element(By.XPATH, "//strong[@id='total']")
Element2 = driverr.find_element(By.XPATH, "//ul[@id='cartList']")

# t = webdriverr.driverr.find_element(By.XPATH, "//strong[@id='total']")

li = driverr.find_element(By.XPATH, "//li[@class='list-group-item d-flex justify-content-between']")
li = li.text
li=li.split("$")
li=li[-1]
li=float(li)


li= float(driverr.find_element(By.XPATH, "//li[@class='list-group-item d-flex justify-content-between']").text.split("$")[-1])

PRIX = driverr.find_element(By.XPATH, "//strong[@id='total']").text
PRIX = PRIX[1:]
PRIX = float(PRIX)

log_directory = "LOG"
log_file_name = "log.txt"
if not os.path.exists(log_directory):
    os.makedirs(log_directory)
log_file_path = os.path.join(log_directory, log_file_name)


if TVA == 0.2 * PRIX:
    with open(log_file_path, 'w') as log_file:
        log_file.write("TVA_true" + "\n")
else:
    with open(log_file_path, 'w') as log_file:
        log_file.write("TVA_fault" + "\n")


input()
