#include "ThingSpeak.h"
#include <ESP8266WiFi.h>
const char* ssid     = "Mr. SKammer's Laptop";
const char* password = "12345678";
unsigned long channel =1675334;
unsigned int LED = 1; // Field No 1
WiFiClient  client;
void setup() {
  Serial.begin(115200);
  delay(100);
  pinMode(LED_BUILTIN, OUTPUT);
  digitalWrite(LED_BUILTIN, HIGH); 
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.print("Netmask: ");
  Serial.println(WiFi.subnetMask());
  Serial.print("Gateway: ");
  Serial.println(WiFi.gatewayIP());
  ThingSpeak.begin(client);
}
void loop() {
  int GLED = ThingSpeak.readFloatField(channel, LED);
  if(GLED == 1){
    digitalWrite(LED_BUILTIN, LOW);
    Serial.println("ON");
    delay(500);
  }
  else{
    digitalWrite(LED_BUILTIN, HIGH);
    Serial.println("OFF");
  }
  delay(500);
}
