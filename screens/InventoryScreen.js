import React, {useEffect, useState} from 'react';
import { View, Text, FlatList, StyleSheet, TouchableOpacity, ActivityIndicator } from 'react-native';
import api from '../utils/api';

export default function InventoryScreen({ navigation }) {
  const [items,setItems] = useState(null);

  useEffect(()=>{ load(); },[]);

  const load = async () => {
    try {
      const res = await api.get('/products');
      setItems(res.data || res);
    } catch(e){ console.error(e); }
  };

  if(!items) return <ActivityIndicator style={{flex:1}} size="large" />;

  const render = ({item}) => (
    <View style={styles.row}>
      <View style={{flex:1}}>
        <Text style={{fontWeight:'bold'}}>{item.name}</Text>
        <Text style={{color:'#6d4c41'}}>₱{item.price} • Stock: {item.stock}</Text>
      </View>
      <View style={{width:120}}>
        <TouchableOpacity style={styles.btn} onPress={()=>navigation.navigate('ProductForm',{product:item})}><Text style={{color:'#fff'}}>Edit</Text></TouchableOpacity>
      </View>
    </View>
  );

  return (
    <View style={{flex:1,backgroundColor:'#f5f0e6',padding:12}}>
      <TouchableOpacity style={[styles.btn,{marginBottom:12}]} onPress={()=>navigation.navigate('ProductForm')}>
        <Text style={{color:'#fff'}}>+ Add Product</Text>
      </TouchableOpacity>
      <FlatList data={items.data || items} keyExtractor={(i)=>String(i.id)} renderItem={render} />
    </View>
  );
}

const styles = StyleSheet.create({
  row:{flexDirection:'row',padding:12,backgroundColor:'#fff',marginBottom:8,borderRadius:8,alignItems:'center'},
  btn:{backgroundColor:'#6f4e37',padding:8,alignItems:'center',borderRadius:6}
});
