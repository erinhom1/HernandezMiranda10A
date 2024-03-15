import sys
import json
import pandas as pd
import plotly.express as px

datos_json = sys.stdin.read()
data = json.loads(datos_json)
df = pd.DataFrame(data)

df['Salida'] = pd.to_datetime(df['Salida'])
df['Entrada'] = pd.to_datetime(df['Entrada'])
df['Hour'] = df['Entrada'].dt.hour

daily_counts = df.resample('D', on='Salida').size().reset_index(name='Counts')
daily_entrada = df.resample('D', on='Entrada').size().reset_index(name='Counts')
merged_counts = pd.merge(daily_counts , daily_entrada, how='outer', left_on='Salida', right_on='Entrada')



fig = px.bar(daily_counts, x='Salida', y='Counts',
             labels={'Counts': 'Salidas', 'Salida': 'Fecha'},
             title='Numero de salidas por dia')

fig.update_xaxes(range=['2023-11-01', '2023-12-01'], tickformat='%Y-%m-%d', tickvals=pd.date_range(start='2023-11-01', end='2023-12-01', freq='D'))
fig.update_yaxes(range=[0, 10], tickformat='d')

fig.write_html('graph1.html')



fig2 = px.bar(merged_counts, x='Salida', y=['Counts_x', 'Counts_y'],
              labels={'Counts_x': 'Salidas', 'Counts_y': 'Entradas'},
              title='Numero de salidas y entradas por dia en Noviembre',
              barmode='group') 

fig2.update_xaxes(title='Salidas/Entradas', range=['2023-11-01', '2023-12-01'], tickformat='%Y-%m-%d', tickvals=pd.date_range(start='2023-11-01', end='2023-12-01', freq='D'))
fig2.update_yaxes(title='', range=[0, 10], tickformat='')

fig2.update_layout(legend_title_text='Tipo', legend=dict(title=dict(text='Tipo'))) 

fig2.write_html('graph2.html')



fig3 = px.pie(df, x='Hour', y='Entrada', nbins=24,
                    labels={'Hour': 'Hour of the Day', 'Entrada': 'Entradas'},
                    title='Distribución de Entradas a lo largo del día',
                    color='Entrada', color_continuous_scale='Viridis',
                    marginal='rug', 
                    height=400)

fig3.update_xaxes(title='Hora del Día', tickvals=list(range(24)))
fig3.update_yaxes(title='Entradas', tickformat='d')
fig3.update_layout(coloraxis_colorbar=dict(title='Counts'))

fig3.write_html('graph3.html')



