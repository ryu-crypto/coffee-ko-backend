import React, {useState, useEffect} from 'react';
import { View, Text, StyleSheet, ScrollView, TouchableOpacity, ActivityIndicator } from 'react-native';
import api from '../utils/api';
import { LineChart } from 'react-native-chart-kit';
import { Dimensions } from 'react-native';

const screenWidth = Dimensions.get('window').width - 40;

export default function DashboardScreen({ navigation }) {
  const [stats,setStats] = useState(null);

  useEffect(()=>{
    fetchStats();
  },[]);

  const fetchStats = async () => {
    try {
      const res = await api.get('/dashboard/stats');
      setStats(res);
    } catch(e){
      console.error(e);
    }
  };

  if(!stats) return <ActivityIndicator style={{flex:1}} size="large" />;

  const labels = stats.weekly.map(w => w.date);
  const data = stats.weekly.map(w => w.total);

  return (
    <ScrollView style={{backgroundColor:'#f5f0e6'}}>
      <View style={styles.container}>
        <Text style={styles.title}>Coffee-Ko Dashboard</Text>

        <View style={styles.cardRow}>
          <View style={styles.card}>
            <Text style={styles.cardTitle}>Inventory</Text>
            <Text style={styles.cardValue}>{stats.inventoryCount}</Text>
          </View>
          <View style={styles.card}>
            <Text style={styles.cardTitle}>Sales Today</Text>
            <Text style={styles.cardValue}>₱{stats.salesToday}</Text>
          </View>
        </View>

        <View style={styles.cardRow}>
          <View style={styles.card}>
            <Text style={styles.cardTitle}>Products</Text>
            <Text style={styles.cardValue}>{stats.totalProducts}</Text>
          </View>
          <View style={styles.card}>
            <Text style={styles.cardTitle}>Deliveries</Text>
            <Text style={styles.cardValue}>{stats.pendingDeliveries}</Text>
          </View>
        </View>

        <Text style={styles.sectionTitle}>Weekly Revenue</Text>
        <LineChart
          data={{
            labels,
            datasets: [{ data }]
          }}
          width={screenWidth}
          height={220}
          yAxisLabel="₱"
          chartConfig={{
            backgroundGradientFrom: "#fffaf3",
            backgroundGradientTo: "#fffaf3",
            color: (opacity = 1) => `rgba(62,39,35, ${opacity})`,
            labelColor: (opacity = 1) => `rgba(62,39,35, ${opacity})`,
            strokeWidth: 2
          }}
          bezier
          style={{ marginVertical: 8, borderRadius: 8 }}
        />

        <Text style={styles.sectionTitle}>Best Sellers</Text>
        {Object.entries(stats.bestSellers || {}).map(([name,qty]) => (
          <View key={name} style={styles.row}>
            <Text>{name}</Text>
            <Text>{qty}</Text>
          </View>
        ))}

        <TouchableOpacity style={styles.button} onPress={()=>navigation.navigate('Inventory')}>
          <Text style={{color:'#fff'}}>Open Inventory</Text>
        </TouchableOpacity>
      </View>
    </ScrollView>
  );
}

const styles = StyleSheet.create({
  container:{padding:20},
  title:{fontSize:22,fontWeight:'bold',color:'#3e2723',marginBottom:12},
  cardRow:{flexDirection:'row',justifyContent:'space-between',marginBottom:12},
  card:{flex:1,backgroundColor:'#fff8f0',padding:12,marginRight:8,borderRadius:8,shadowColor:'#000',shadowOpacity:0.05,elevation:2},
  cardTitle:{fontSize:12,color:'#6d4c41'},
  cardValue:{fontSize:18,fontWeight:'bold',color:'#3e2723'},
  sectionTitle:{fontSize:16,fontWeight:'bold',marginTop:8,color:'#3e2723'},
  row:{flexDirection:'row',justifyContent:'space-between',paddingVertical:8,borderBottomWidth:1,borderBottomColor:'#eee'},
  button:{backgroundColor:'#6f4e37',padding:12,alignItems:'center',marginTop:20,borderRadius:6}
});
