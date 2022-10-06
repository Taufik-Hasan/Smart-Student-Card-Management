#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
WiFiClient wifiClient;

#define SS_PIN D4
#define RST_PIN D2

#define ERROR_PIN D0
#define SUCCESS_PIN D1
#define CONN_PIN D8


const char *ssid = "xiaomi_a"; //WIFI NAME OR HOTSPOT
const char *password = "abcde12345"; //WIFI PASSWORD POR MOBILE HOTSPOT PASSWORD

MFRC522 mfrc522(SS_PIN, RST_PIN);
void setup() {
   delay(1000);
   Serial.begin(9600);
   WiFi.mode(WIFI_OFF);    
   delay(1000);
   WiFi.mode(WIFI_STA);
   WiFi.begin(ssid, password);
   Serial.println("");

   pinMode(CONN_PIN, OUTPUT);
   pinMode(SUCCESS_PIN, OUTPUT);
   pinMode(ERROR_PIN, OUTPUT);
   
   Serial.print("Connecting");
   while (WiFi.status() != WL_CONNECTED) {
     digitalWrite(CONN_PIN, LOW);
     delay(250);
     Serial.print(".");
     digitalWrite(CONN_PIN, HIGH);
     delay(250);
   }

   Serial.println("");
   Serial.print("Connected to ");
   Serial.println(ssid);
   Serial.print("IP address: ");
   Serial.println(WiFi.localIP()); 
   
   SPI.begin();
   mfrc522.PCD_Init();
}

void sendRfidLog(long cardid) {
  
  if(WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    String postData = "UIDresult=" + String(cardid);
    String ip_address = "192.168.31.30"; // Xampp server local IP address 
    http.begin(wifiClient,"http://"+ip_address+"/SmartStudentCard/include/getUID.php");              
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");  
    
    int httpCode = http.POST(postData); 
    String payload = http.getString();
    if(httpCode==-1){
      Serial.println("Server not connected.");
      digitalWrite(ERROR_PIN, HIGH);
    }else if(httpCode==200){
        Serial.println("Data sent successfully.");
        digitalWrite(SUCCESS_PIN, HIGH);
     } else{
        Serial.println("Error found!");
        digitalWrite(ERROR_PIN, HIGH);
     }
    http.end();
  }
}

void toggleConnStat() {
  if(WiFi.status() == WL_CONNECTED) {
    digitalWrite(CONN_PIN, HIGH);
  } else {
    digitalWrite(CONN_PIN, LOW);
  }
}

void loop() {

  if ( mfrc522.PICC_IsNewCardPresent()){
    if ( mfrc522.PICC_ReadCardSerial()){
      long code=0;
      for (byte i = 0; i < mfrc522.uid.size; i++){
        code=code*10+mfrc522.uid.uidByte[i];
      }
      sendRfidLog(code);
      Serial.println("Card number: "+String(code));
    }
  }
  
  toggleConnStat();
  delay (500);
  
  digitalWrite(SUCCESS_PIN, LOW);
  digitalWrite(ERROR_PIN, LOW);
     
}
