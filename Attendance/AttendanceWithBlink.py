from glob import glob
from operator import truediv
from pickle import NONE
from tabnanny import check
import numpy as np
import cv2
import face_recognition
import os
from datetime import datetime
from pydoc import classname
from flask import Flask,render_template,Response
import gspread
from oauth2client.service_account import ServiceAccountCredentials
import json

scopes = [
'https://www.googleapis.com/auth/spreadsheets',
'https://www.googleapis.com/auth/drive'
]
credentials = ServiceAccountCredentials.from_json_keyfile_name("attendancelist-363211-afc9e65a5e2b.json", scopes) #access the json key you downloaded earlier 
file = gspread.authorize(credentials) # authenticate the JSON key with gspread
sheet = file.open("Attendance")  #open sheet
sheet = sheet.sheet1  #replace sheet_name with the name that corresponds to yours, e.g, it can be sheet1

app=Flask(__name__)
camera=cv2.VideoCapture(0)

#ngelist semua yg ada di folder foto
path = 'ImagesAttendance'
images = []
Class_Names = []
My_List = os.listdir(path)

# mau ngilangin .jpg nya
for cl in My_List:
    try:
        Current_Img = cv2.imread(f'{path}/{cl}')
        images.append(Current_Img)
        Class_Names.append(os.path.splitext(cl)[0])
    except:
        continue

def findEncodings(images):
    Encode_List = []
    for img in images:
        try:
            img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
            encode = face_recognition.face_encodings(img)[0]
            Encode_List.append(encode)
        except:
            continue
    return Encode_List

def markAttendance(name):
    with open('Attendance.csv','r+') as f:
        # if somebody already arrive we dont want to repeate it
        My_Data_List = f.readlines()
        Name_List = []
        for line in My_Data_List:
            entry = line.split(', ')
            Name_List.append(entry[0])
        
        # if name in Name_List:
        #     print('')

        if name not in Name_List:
            now = datetime.now()
            dtString = now.strftime('%H:%M:%S')
            if dtString <= "08:00:00":
                f.writelines(f'\n{name}, {dtString}, On Time')
                sheet.update_cell(startRow, 1, name)
                sheet.update_cell(startRow, 2, dtString)
                sheet.update_cell(startRow, 3, 'On Time')
            else:
                f.writelines(f'\n{name}, {dtString}, Late')
                sheet.update_cell(startRow, 1, name)
                sheet.update_cell(startRow, 2, dtString)
                sheet.update_cell(startRow, 3, 'Late')

def checkSheets():
    f = open("Attendance.csv", "w")
    f.truncate()
    f.writelines("Name, Time, Description")
    f.writelines(f'\n')
    global startRow
    startRow = 3
    checkCounter = 0
    while(sheet.cell(startRow,1).value):
        # if(sheet.cell(startRow,1).value != NONE):
        print(f"Row {startRow} is filled")
        f.writelines(f'\n{sheet.cell(startRow,1).value}, {sheet.cell(startRow,2).value}, {sheet.cell(startRow,3).value}')
        startRow = startRow + 1
        checkCounter = checkCounter + 1
        if(checkCounter == 10):
            break
    print(startRow)
    f.close()

encoded = 0

if encoded == 0:
    checkSheets()
    Encode_ListKnown = findEncodings(images)
    encoded = 1
    print('Encoding Complete')  

Face_Cascade = cv2.CascadeClassifier(cv2.data.haarcascades+"haarcascade_frontalface_default.xml")
# Eyes_Cascade = cv2.CascadeClassifier(cv2.data.haarcascades+"haarcascade_eye_tree_eyeglasses.xml")

# find matches image from webcam
cap = cv2.VideoCapture(0)
# ret,img = cap.read()

maskNote = 1
# blinkCount = 3
First_Read = True
stage = 1
attended = 0
# blinking = 0

def generate_frames():
    # ret, img = cap.read()
    
    global stage
    global maskNote
    global attended
    global name
    # global blinkCount
    # global blinking
    # global eyes
    global faces
    # global eye_face
    # global eye_face_clr
    global startRow
    while True:
        ret, frame = cap.read()
        
        # cv2.imshow('Webcam',img)
        # cv2.waitKey(1)
        # return None
        # if not ret:
        #     break
        if stage == 2:
            gray_scale = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
            gray_scale = cv2.bilateralFilter(gray_scale, 5, 1, 1)
            faces = Face_Cascade.detectMultiScale(frame, 1.3, 5, minSize=(200,200))
            cv2.putText(frame,f'Identity: {name}',(50,35),cv2.FONT_HERSHEY_DUPLEX,0.6,(0,0,0),3)
            cv2.putText(frame,f'Identity: {name}',(50,35),cv2.FONT_HERSHEY_DUPLEX,0.6,(255,255,255),1)

            if attended == 1:
                cv2.putText(frame, 'Attendance Inputted Successfully, have a Nice Day!', (70,70), cv2.FONT_HERSHEY_DUPLEX, 0.6, (0,0,0),3)
                cv2.putText(frame, 'Attendance Inputted Successfully, have a Nice Day!', (70,70), cv2.FONT_HERSHEY_DUPLEX, 0.6, (0,255,0),1)


            # if len(faces) > 0:
            #     for(x,y,w,h) in faces:
            #         eye_face = gray_scale[y:y+h, x:x+w]
            #         eye_face_clr = frame[y:y+h, x:x+w]
            #         eyes = Eyes_Cascade.detectMultiScale(eye_face, 1.3, 5, minSize=(50,50))
            #         if blinkCount > 0:
            #             cv2.putText(frame, f'Please blink {blinkCount} time(s) to confirm Attendance', (70,70), cv2.FONT_HERSHEY_DUPLEX, 0.6, (0,0,0),3)
            #             cv2.putText(frame, f'Please blink {blinkCount} time(s) to confirm Attendance', (70,70), cv2.FONT_HERSHEY_DUPLEX, 0.6, (0,255,0),1)
            #         if len(eyes) >= 2 and attended == 0 and blinking == 1: 
            #             blinking = 0
            #         elif len(eyes) < 2 and attended == 0 and blinking == 0:
            #             blinkCount = blinkCount - 1
            #             blinking = 1
            #             cv2.waitKey(750)
            #             print(blinkCount)
            #             if blinkCount == 0:
            #                 markAttendance(name)
            #                 startRow = startRow + 1
            #                 attended = 1    
            # else:
            #     if attended == 0:
            #         blinkCount = 3
            #         cv2.putText(frame, "No face detected", (70,70), cv2.FONT_HERSHEY_DUPLEX, 0.6, (0,255,0),2)
            
        if stage == 1:
            Small_Img = cv2.resize(frame,(0,0),None,fx = 0.25,fy= 0.25)
            Small_Img = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)

            Faces_Curr_Frame = face_recognition.face_locations(Small_Img)
            Encode_Curr_Frame = face_recognition.face_encodings(Small_Img, Faces_Curr_Frame)
            
            if maskNote == 1:
                cv2.putText(frame,'For more accurate scan, please take off your mask.',(70,70),cv2.FONT_HERSHEY_DUPLEX,0.6,(0,0,0),3)
                cv2.putText(frame,'For more accurate scan, please take off your mask.',(70,70),cv2.FONT_HERSHEY_DUPLEX,0.6,(255,255,255),1)
            
            for Encode_Face in Encode_Curr_Frame:
                matches = face_recognition.compare_faces(Encode_ListKnown, Encode_Face)
                Face_Distance = face_recognition.face_distance(Encode_ListKnown, Encode_Face)
                Match_Index = np.argmin(Face_Distance)
 
                name = Class_Names[Match_Index]

                if matches[Match_Index] and Face_Distance[Match_Index] <= 0.45:
                    stage = 2
                    maskNote = 0
                    name = name.upper()
                    markAttendance(name)
                    startRow = startRow + 1
                    attended = 1    
                    
                else:
                    cv2.putText(frame,'Identity: STRANGER',(50,35),cv2.FONT_HERSHEY_DUPLEX,0.6,(0,0,0),3)
                    cv2.putText(frame,'Identity: STRANGER',(50,35),cv2.FONT_HERSHEY_DUPLEX,0.6,(0,0,255),1)

        if not ret:
            break
        else:
            ret, buffer = cv2.imencode('.jpg', frame)
            frame = buffer.tobytes()
        yield(b'--frame\r\n'b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')

@app.route('/')
def index():
    return render_template('main.php')

@app.route('/scan')
def scan():
    return render_template('scan.php')

# @app.route('/indexPIC')
# def indexPIC():
#     return render_template('/HomePage/indexPIC.php')

@app.route('/logout')
def indexPIC():
    return render_template('/UserAccount/logout.php')

@app.route('/background_process_test')
def background_process_test():
    print("Hello")
    global maskNote
    # global blinkCount
    global First_Read
    global stage
    global attended
    # global blinking
    maskNote = 1
    # blinkCount = 3
    First_Read = True
    stage = 1
    attended = 0
    # blinking = 0
    return("nothing")

@app.route('/video_feed')
def video_feed():
    return Response(generate_frames(), mimetype='multipart/x-mixed-replace; boundary=frame')

if __name__=="__main__":
    app.run(debug=True)