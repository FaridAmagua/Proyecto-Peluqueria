package jpanel;

import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableColumnModel;

import com.mysql.cj.protocol.Resultset;
import com.mysql.cj.xdevapi.Result;

import Conexiones.Conexion;

import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.JLabel;
import java.awt.Font;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Iterator;
import java.util.Vector;
import java.awt.Button;
import java.awt.Cursor;

import javax.swing.JMenuBar;
import javax.swing.JMenu;
import javax.swing.JMenuItem;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import javax.swing.JButton;

public class VentanaCitasActivas extends JFrame {

	private JPanel contentPane;
	private JTable table1;
	public Resultset res ;
	private JMenuBar menuBar;
	private Button btnCargarAriticulo;
	private CallableStatement ps;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					VentanaCitasActivas frame = new VentanaCitasActivas();
					frame.setVisible(true);

				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public VentanaCitasActivas() {
		setBounds(100, 100, 666, 394);

		menuBar = new JMenuBar();
		setJMenuBar(menuBar);
		this.setLocationRelativeTo(null);


		btnCargarAriticulo = new Button("Cargar");
		btnCargarAriticulo.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {
				try {
					CargarTabla();
				} catch (SQLException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
					System.out.println("NO SALE NADA");
				}
			}
		});
		menuBar.add(btnCargarAriticulo);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		contentPane.setLayout(new BorderLayout(0, 0));
		setContentPane(contentPane);

		JScrollPane scrollPane = new JScrollPane();
		contentPane.add(scrollPane, BorderLayout.CENTER);

		table1 = new JTable();
		table1.setModel(new DefaultTableModel(
				new Object[][] {
				},
				new String[] {
						 "Nº reserva", "Fecha", "Usuario","Tratamiento","Precio"
				}
				));
		scrollPane.setViewportView(table1);
	}
	public void CargarTabla() throws SQLException {

		DefaultTableModel modelo = (DefaultTableModel) table1.getModel();
		modelo.setRowCount(0);


		Connection con = null;
		try {
			con = Conexiones.Conexion.getConnection();
		} catch (ClassNotFoundException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
			System.out.println("ERROR EN CARGA DE TABLA");
		}


		Statement declara = con.createStatement();
		ResultSet respuesta = declara.executeQuery("{call ConsultarUsuarios() }");
		while (respuesta.next()) {
		
			
			Vector v = new Vector();
			v.add(respuesta.getInt(1));
			v.add(respuesta.getString(2));
			v.add(respuesta.getString(3));
			v.add(respuesta.getString(4));
			v.add(respuesta.getInt(5));
	
			
			
			//System.err.println(respuesta.getInt(1)+"o");
		
			
			modelo.addRow(v);
			table1.setModel(modelo);
			
			


			System.out.println(respuesta.getString("id_reserva") + ", " + respuesta.getString("fecha"));
			

		
		
		}
	}
	
}







