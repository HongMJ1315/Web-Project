

# 使用edge 連接網頁https://dream.ai/create 並在ControlID-1填入文字sword
from selenium import webdriver
from selenium.webdriver.common.by import By
import time
import urllib
import os

keyword=input()
# total=int(input())
driver = webdriver.Firefox()    
driver.get('https://dream.ai/create')
driver.find_element(By.CSS_SELECTOR,'input.TextInput__Input-sc-1qnfwgf-1.fxymfk.PromptConfig__Input-sc-1p3eskz-0.gXZqjV').send_keys(keyword)  # 填入文字
for i in range(55,100):
    # 選擇網頁class ArtStyles__ArtStyleThumbnail-sc-1xc47b6-3 bwtyHl
    driver.find_element(By.CSS_SELECTOR,'img[alt="HDR"]').click()  
    # Button-sc-1fhcnov-2 iMLenh CreateButton__StyledCreateButton-sc-1yr4ch-0 fMNHJW
    driver.find_element(By.CSS_SELECTOR,'button.Button-sc-1fhcnov-2.iMLenh.CreateButton__StyledCreateButton-sc-1yr4ch-0.fMNHJW').click()  
    #儲存圖片 class ArtCard__CardImage-sc-67t09v-2 dOXnUm 的網址的圖片
    while(True):
        try:
            res=driver.find_element(By.CSS_SELECTOR,'img.ArtCard__CardImage-sc-67t09v-2.dOXnUm')
            url=res.get_attribute('src')
            path="./"+keyword
            if not os.path.isdir(path):
                os.mkdir(path)
            urllib.request.urlretrieve(url, os.path.join(path, keyword+str(i)+".png"))
            print("ok "+keyword+str(i)+".png")
            break
        except:
            time.sleep(3)
            print("waiting")
            continue
        
    driver.find_element(By.CSS_SELECTOR,'button.Button-sc-1fhcnov-2.kiWTtt.IconButton__StyledButton-sc-145zyhb-0.fDstFR.BackButton__StyledBackButton-sc-188wvui-0.diaFKG').click()