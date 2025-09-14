import React, {useState} from 'react';
import { View, Text, TextInput, Button, StyleSheet, Alert } from 'react-native';
import api from '../utils/api';

export default function LoginScreen({ navigation }) {
  const [email,setEmail] = useState('');
  const [password,setPassword] = useState('');

  const onLogin = async () => {
    try {
      const res = await api.post('/login', { email, password });
      // save token (for simplicity, we'll keep in memory — production: secure storage)
      global.apiToken = res.token;
      navigation.replace('Dashboard');
    } catch (e) {
      Alert.alert('Login failed','Invalid credentials');
    }
  };

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Coffee-Ko Admin</Text>
      <TextInput placeholder="Email" value={email} onChangeText={setEmail} style={styles.input} autoCapitalize="none" />
      <TextInput placeholder="Password" value={password} onChangeText={setPassword} secureTextEntry style={styles.input} />
      <Button title="Login" onPress={onLogin} />
    </View>
  );
}

const styles = StyleSheet.create({
  container:{flex:1,justifyContent:'center',padding:20,backgroundColor:'#f5f0e6'},
  title:{fontSize:24,fontWeight:'bold',marginBottom:20,textAlign:'center',color:'#3e2723'},
  input:{borderWidth:1,borderColor:'#d7ccc8',padding:10,marginBottom:10,backgroundColor:'#fff'}
});
