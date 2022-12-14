#取得資料夾所有圖片
import os
from PIL import Image
def get_all_files(path):
    files = []
    for root, dirs, filenames in os.walk(path):
        for f in filenames:
            files.append(os.path.join(root, f))
    return files


res=get_all_files(".")
all=[]
for i in res:
    if i[-4:]!=".png":
        continue
    all.append(i.replace(".\\",""))
    
print(all)

for i in all:
    img= Image.open(i)
    new_img = img.crop((80,220,1000,1750 ))
    new_img.save("fix\\"+i)
    
# img= Image.open("shield0.png")
# new_img = img.crop((80,220,  1000,1750 ))
# new_img.save("fix\\"+"shield0.png")